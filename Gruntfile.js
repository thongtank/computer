module.exports = function(grunt) {
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.initConfig({
        watch: {
            files: ['*.html', '*.php'],
            options: {
                livereload: true
            }
        }
    });
};
