module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            options: {
                includePaths: ['bower_components/foundation/scss', 'bower_components/foundation-icon-fonts']
            },
            dist: {
                options: {
                    outputStyle: 'compressed'
                },
                files: {
                    '../public/css/app.css': 'scss/app.scss'
                }
            }
        },

        watch: {
            grunt: { files: ['Gruntfile.js'] },

            sass: {
                files: 'scss/**/*.scss',
                tasks: ['sass']
            },

            concat: {
                files: 'js/*.js',
                tasks: ['concat', 'uglify']
            }
        },

        concat: {
            dist: {
                src: [
                    'bower_components/jquery/dist/jquery.min.js',
                    'bower_components/svg.js/dist/svg.js',
                    'js/app.js'
                ],
                dest: '../public/js/build/app.js'
            }
        },

        uglify: {
            build: {
                src: '../public/js/build/app.js',
                dest: '../public/js/build/app.min.js'
            }
        },

        copy: {
            develpr: {
                files: [
                    {
                        expand: true,
                        flatten: true,
                        src:"bower_components/foundation-icon-fonts/foundation-icons.woff",
                        dest:"../public/bower_components/foundation-icon-fonts/"
                    }
                ]
            }
        }

    });



    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-copy');

    grunt.registerTask('build', ['sass']);
    grunt.registerTask('default', ['build','concat','uglify', 'sass', 'copy'])
    grunt.registerTask('watch', ['build','concat','uglify', 'sass', 'copy' ,'watch'])
}
