var gulp = require('gulp'),
    connect = require('gulp-connect-php'),
    browserSync = require('browser-sync');
    sass = require('gulp-sass')(require('sass'));
 
gulp.task('connect-sync', function() {
  connect.server({}, function (){
    browserSync({
      proxy: '127.0.0.1:8000'
    });
  });
});

gulp.task('watch', function() {
  gulp.watch('**/*.php').on('change', function () {
    browserSync.reload();
  });
  gulp.watch('**/*.css').on('change', function () {
    browserSync.reload();
  });
})

gulp.task('default', gulp.parallel('connect-sync', 'watch'));