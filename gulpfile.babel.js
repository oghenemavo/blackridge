import gulp from 'gulp';
import yargs from 'yargs';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpIf from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';


const PRODUCTION = yargs.argv.prod;
const sass = gulpSass(dartSass);

const paths = {
    styles: {
        src: ['src/assets/scss/bundle.scss', 'src/assets/scss/admin-bundle.scss'],
        dest: 'dist/assets/css'
    }
};

export const styles = () => {
    return gulp.src(paths.styles.src)
        .pipe(gulpIf( !PRODUCTION, sourcemaps.init() ))
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpIf( PRODUCTION, cleanCss({ compatibility: 'ie8' }) ))
        .pipe(gulpIf( !PRODUCTION, sourcemaps.write() ))
        .pipe(gulp.dest(paths.styles.dest));
}

export const watch = () => {
    gulp.watch('src/assets/scss/**/*.scss', styles);
}