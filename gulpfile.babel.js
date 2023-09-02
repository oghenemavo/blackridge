import gulp from 'gulp';
import yargs from 'yargs';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpIf from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';


const PRODUCTION = yargs.argv.prod;
const sass = gulpSass(dartSass);

const paths = {
    styles: {
        src: ['src/assets/scss/bundle.scss', 'src/assets/scss/admin-bundle.scss'],
        dest: 'dist/assets/css'
    },
    images: {
        src: 'src/assets/images/**/*.{png,jpg,jpeg,svg,gif}',
        dest: 'dist/assets/images',
    },
    other: {
        src: ['src/assets/**/*', '!src/assets/{images,js,scss}', '!src/assets/{images,js,scss}/**/*'],
        dest: 'dist/assets',
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

export const images = () => {
    return gulp.src(paths.images.src)
        .pipe(gulpIf(PRODUCTION, imagemin()))
        .pipe(gulp.dest(paths.images.dest))
}

export const copy = () => {
    return gulp.src(paths.other.src)
        .pipe(gulp.dest(paths.other.dest))
}

export const clean = () => del(['dist']);

export const watch = () => {
    gulp.watch('src/assets/scss/**/*.scss', styles);
    gulp.watch(paths.images.src, images);
    gulp.watch(paths.other.src, copy);
}

export const dev = gulp.series(clean, gulp.parallel(styles, images, copy), watch);
export const build = gulp.series(clean, gulp.parallel(styles, images, copy));

export default dev;