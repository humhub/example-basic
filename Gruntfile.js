module.exports = function (grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        // Concat JS files
        concat: {
            default: {
                src:[
                    'resources/js/humhub.example-basic.js',
                    //'resources/js/humhub.example-basic.another.js',
                ],
                dest: 'resources/js/humhub.example-basic.bundle.js'
            },
        },
        // Minify JS files
        uglify: {
            default: {
                files: {
                    'resources/js/humhub.example-basic.bundle.min.js': ['resources/js/humhub.example-basic.bundle.js'],
                }
            }
        },
        // Compile SCSS to CSS
        sass: {
            options: {
                implementation: require('sass'),
                sourceMap: true,
                sourceMapEmbed: false,
                sourceMapContents: true,
                outputStyle: 'expanded'
            },
            dev: {
                files: {
                    'resources/css/humhub.example-basic.css': 'resources/css/humhub.example-basic.scss',
                }
            }
        },
        // Minify CSS files
        cssmin: {
            options: {
                sourceMap: true
            },
            target: {
                files: {
                    'resources/css/humhub.example-basic.min.css': ['resources/css/humhub.example-basic.css'],
                }
            }
        },
        // Watch for changes in JS and SCSS files
        watch: {
            scripts: {
                files: ['resources/js/*.js', 'resources/css/*.scss'],
                tasks: ['build'],
                options: {
                    spawn: false,
                },
            },
        },
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Fix source map paths (remove 'resources/css/' prefix)
    grunt.registerTask('fix-sourcemaps', function() {
        const maps = grunt.file.expand('resources/css/*.map');
        maps.forEach(file => {
            let content = grunt.file.read(file);
            // Replace only inside "sources":[...]
            content = content.replace(/"resources\/css\//g, '"');
            grunt.file.write(file, content);
        });
    });

    grunt.registerTask('build', ['concat', 'uglify', 'sass', 'cssmin', 'fix-sourcemaps']);
};