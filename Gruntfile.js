module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		concat: {
			options: {
				separator: '\n;'
			},
			basic: {
				src: ['webroot/js/bootstrap.js', 
					  'webroot/js/permissionsKeyPress.js', 
					  'webroot/plugins/placeholder.js', 
					  'webroot/plugins/untInput.js'],
				dest: 'webroot/js/main.min.js'
			},
			vendor: {
				src: ['webroot/js/lib/jquery.cookie.min.js', 
					  'webroot/js/lib/jquery.jscrollpane.min.js',
					  'webroot/js/lib/jquery.mousewheel.min.js', 
					  'webroot/js/lib/jquery.qtip.min.js', 
					  'webroot/js/lib/modernizr.min.js'],
				dest: 'webroot/js/lib/vendors.min.js'
			}
		},
		uglify: {
			options: {

			},
			dist: {
				files: {
					'<%= concat.basic.dest%>':['<%= concat.basic.dest%>']
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-concat');

	grunt.registerTask('default', ['concat', 'uglify']);
}