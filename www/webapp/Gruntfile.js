module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            options: {
                includePaths: ['bower_components/prismjs', 'bower_components/foundation/scss', 'bower_components/foundation-icon-fonts']
            },
            dist: {
                options: {

                },
                files: {
                    '../public/css/app.css': 'scss/app.scss'
                }
            }
        },

        watch: {
            grunt: { files: ['Gruntfile.js'] },

            src: {
                files: 'scss/**/*.scss',
                tasks: ['sass']
            }
        },

        concat: {
            dist: {
                src: [
                    'bower_components/jquery/dist/jquery.js',
                    'bower_components/fastclick/lib/fastclick.js',
                    'bower_components/foundation/js/foundation/foundation.js',
                    'bower_components/foundation/js/foundation/foundation.offcanvas.js',
                    'bower_components/svg.js/dist/svg.js',
                    'bower_components/prismjs/prism.js',
                    'bower_components/prismjs/components/prism-clike.js',
                    'bower_components/prismjs/components/prism-python.js',
                    'bower_components/prismjs/components/prism-php.js',
                    'bower_components/prismjs/components/prism-http.js',
                    'bower_components/prismjs/components/prism-java.js',
                    'bower_components/prismjs/components/prism-scss.js',
                    'bower_components/prismjs/components/prism-css.js',
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
                    },
                    {
                        expand: true,
                        flatten: true,
                        src:"bower_components/modernizr/modernizr.js",
                        dest:"../public/bower_components/modernizr/"
                    },
                    {
                        expand: true,
                        flatten: true,
                        src:"bower_components/prismjs/prism.css",
                        dest:"bower_components/prismjs/",
                        rename: function(dest, src) {
                            return dest + '_prism.scss';
                        }
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
    grunt.registerTask('default', ['copy', 'build','concat','uglify', 'sass']);
}
