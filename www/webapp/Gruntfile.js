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
      }
    },
	
	concat: {   
	    dist: {
	        src: [
	            'bower_components/foundation/js/vendor/modernizr.js',
				'bower_components/jquery/jquery.js',
				'bower_components/foundation/js/foundation.min.js',	
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
	
  });
  
  

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.registerTask('build', ['sass']);
  grunt.registerTask('default', ['build','concat','uglify','watch'])
}
