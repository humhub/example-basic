<?php

# ----- Configuration -------------------------------------------------------------------------------------------

// New Module ID in KebabCase (e.g. my-plugin, super-plugin, voting)
$newModuleId = "example-basic";
$newNamespace = 'acmeCorp\humhub\modules\exampleBasic';

# ---------------------------------------------------------------------------------------------------------------

$baseDir = dirname(__FILE__, 2);

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

if (str_contains($newModuleId, (string) $oldModuleId) && $oldModuleId !== $newModuleId) {
    print "Old module ID cannot be part of the new module id!\n";
    die();
}

if (str_contains($newNamespace, $oldNamespace) && $oldNamespace !== $newNamespace) {
    print "Old module namespace cannot be part of the new namespace!\n";
    die();
}


$it = new RecursiveDirectoryIterator($baseDir);
foreach (new RecursiveIteratorIterator($it) as $file) {
    /** @var SplFileInfo $file */
    if (str_contains($file, '.git') || str_contains($file, '.idea') || $file->isDir() || $file == __FILE__) {
        continue;
    }

    // Replace in files
    $fileContent = file_get_contents($file);
    $fileContent = str_replace($oldNamespace, $newNamespace, $fileContent);
    $fileContent = str_replace($oldModuleId, $newModuleId, $fileContent);
    $fileContent = str_replace(ucfirst((string) $oldModuleId), ucfirst($newModuleId), $fileContent);
    $fileContent = str_replace(dashesToCamelCase($oldModuleId), dashesToCamelCase($newModuleId), $fileContent);
    $fileContent = str_replace(ucfirst(dashesToCamelCase($oldModuleId)), ucfirst(dashesToCamelCase($newModuleId)), $fileContent);
    file_put_contents($file, $fileContent);
    print "Searched&replaced in: " . $file . "\n";

    // Rename file names (e.g. resources/js/humhub.example-basic.js)
    if (str_contains($file->getBasename(), (string) $oldModuleId)) {
        $newFileName = $file->getPath() . '/' . str_replace($oldModuleId, $newModuleId, $file->getBasename());

        rename($file, $newFileName);
        print "Renamed file: " . $file . " to " . $newFileName . "\n";
    }
}

/**
 * @return string
 */
function camelCaseToDashed($className): string
{
    return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1-', (string) $className));
}

function dashesToCamelCase($string, $capitalizeFirstCharacter = false): string
{
    $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    if (!$capitalizeFirstCharacter) {
        $str[0] = strtolower($str[0]);
    }
    return $str;
}
