<?php

# ----- Configuration -------------------------------------------------------------------------------------------

$newModuleId = "example-basic";
$newNamespace = 'acmeCorp\humhub\modules';

# ---------------------------------------------------------------------------------------------------------------

$baseDir = dirname(dirname(__FILE__));

#$oldModuleId = "example-basic";
$moduleInfo = json_decode(file_get_contents($baseDir . '/module.json'), true);
$oldModuleId = $moduleInfo['id'];

#$oldNamespace = 'humhubContrib\modules';
$moduleClass = file_get_contents($baseDir . '/Module.php');
preg_match('/namespace (.*?);/', $moduleClass, $matches);
$oldNamespace = $matches[1];

print "\n\n*** Change Module ID and Namespace Script ***\n\n";

print "Convert namespace\n";
print "\tOld:\t" . $oldNamespace . "\n";
print "\tNew:\t" . $newNamespace . "\n";
print "\n";
print "Convert module id\n";
print "\tOld:\t" . $oldModuleId . "\t(" . dashesToCamelCase($oldModuleId) . ")\n";
print "\tNew:\t" . $newModuleId . "\t(" . dashesToCamelCase($newModuleId) . ")\n";
print "\n";

if (strpos($newModuleId, $oldModuleId) !== false && $oldModuleId !== $newModuleId) {
    print "Old module ID cannot be part of the new module id!\n";
    die();
}

if (strpos($newNamespace, $oldNamespace) !== false && $oldNamespace !== $newNamespace) {
    print "Old module namespace cannot be part of the new namespace!\n";
    die();
}


$it = new RecursiveDirectoryIterator($baseDir);
foreach (new RecursiveIteratorIterator($it) as $file) {
    /** @var SplFileInfo $file */
    if (strpos($file, '.git') !== false || strpos($file, '.idea') !== false || $file->isDir() || $file == __FILE__) {
        continue;
    }

    // Replace in files
    $fileContent = file_get_contents($file);
    $fileContent = str_replace($oldModuleId, $newModuleId, $fileContent);
    $fileContent = str_replace(dashesToCamelCase($oldModuleId), dashesToCamelCase($newModuleId), $fileContent);
    $fileContent = str_replace($oldNamespace, $newNamespace, $fileContent);
    file_put_contents($file, $fileContent);
    print "Searched&replaced in: " . $file . "\n";

    // Rename file names (e.g. resources/js/humhub.example-basic.js)
    if (strpos($file->getBasename(), $oldModuleId) !== false) {
        $newFileName = $file->getPath() . '/' . str_replace($oldModuleId, $newModuleId, $file->getBasename());

        rename($file, $newFileName);
        print "Renamed file: " . $file . " to " . $newFileName . "\n";
    }
}

function camelCaseToDashed($className)
{
    return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1-', $className));
}

function dashesToCamelCase($string, $capitalizeFirstCharacter = false)
{
    $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    if (!$capitalizeFirstCharacter) {
        $str[0] = strtolower($str[0]);
    }
    return $str;
}
