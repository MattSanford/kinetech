module.exports = function(grunt) {
	grunt.initConfig({
		  express: {
		    files:  [ '**/*.js' ],
		    tasks:  [ 'express:dev' ],
		    dev: {
		      options: {
		        script: 'app.js'
		      }
		    },
		    options: {
		      spawn: false
		    }
		  }, 		
		watch: {
			files: ['sass/*/*.scss'],
			tasks: ['sass'],
			options: { spawn: false, livereload: true }
		},
		sass: {
			dist: {
				options: {
					compass: true,
					update: true
				},
				files : [{
					expand: true,
					cwd: 'sass/',
					src: ['*.scss'],
					dest: 'dist/css/',
					ext: '.css'
				}]				
			}
		}
	});

grunt.loadNpmTasks('grunt-express-server');	
grunt.loadNpmTasks('grunt-contrib-watch');
grunt.loadNpmTasks('grunt-contrib-sass');
grunt.loadNpmTasks('grunt-keepalive');

grunt.registerTask('serve', ['express:dev', 'keepalive']);
grunt.registerTask('default', ['sass', 'watch', 'serve']);	
}