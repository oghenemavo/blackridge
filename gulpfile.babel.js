import gulp from 'gulp';
import yargs from 'yargs';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpIf from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import uglify from 'gulp-uglify';
import named from 'vinyl-named';
import browserSync from 'browser-sync';
import zip from 'gulp-zip';

const server = browserSync.create();
const PRODUCTION = yargs.argv.prod;
const sass = gulpSass(dartSass);

const paths = {
    styles: {
        src: ['src/assets/scss/bundle.scss', 'src/assets/scss/admin-bundle.scss'],
        dest: 'dist/assets/css'
    },
    scripts: {
        src: ['src/assets/js/bundle.js', 'src/assets/js/admin-bundle.js'],
        dest: 'dist/assets/js'
    },
    images: {
        src: 'src/assets/images/**/*.{png,jpg,jpeg,svg,gif}',
        dest: 'dist/assets/images',
    },
    other: {
        src: ['src/assets/**/*', '!src/assets/{images,js,scss}', '!src/assets/{images,js,scss}/**/*'],
        dest: 'dist/assets',
    },
    package: {
        src: ['**/*', '!node_modules{,/**}', '!src{,/**}', '!package', '!.babelrc', '!gulpfile.babel.js', '!package-lock.json', '!package.json', '!.gitignore'],
        dest: 'package'
    }
};

export const styles = () => {
    return gulp.src(paths.styles.src)
        .pipe(gulpIf( !PRODUCTION, sourcemaps.init() ))
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpIf( PRODUCTION, cleanCss({ compatibility: 'ie8' }) ))
        .pipe(gulpIf( !PRODUCTION, sourcemaps.write() ))
        .pipe(gulp.dest(paths.styles.dest))
        .pipe(server.stream());
}

export const scripts = () => {
    return gulp.src(paths.scripts.src)
        .pipe(named())
        .pipe(webpack({
            module: {
                loaders: [
                  {
                    test: /\.js$/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: [ '@babel/preset-env' ]
                        }
                    }
                  }
                ]
            },
            externals: {
                jquery: 'jQuery'
            },
            output: {
                filename: '[name].js'
            },
            devtool: !PRODUCTION ? 'inline-source-maps' : false
        }))
        .pipe(gulpIf(PRODUCTION, uglify()))
        .pipe(gulp.dest(paths.scripts.dest));
}

export const images = () => {
    return gulp.src(paths.images.src)
        .pipe(gulpIf(PRODUCTION, imagemin()))
        .pipe(gulp.dest(paths.images.dest))
}

export const serve = (cb) => {
    server.init({
        proxy: 'http://localhost/blueridge'
    })
    cb();
}

export const reload = (cb) => {
    server.reload();
    cb();
}

export const copy = () => {
    return gulp.src(paths.other.src)
        .pipe(gulp.dest(paths.other.dest))
}

export const compress = () => {
    return gulp.src(paths.package.src)
        .pipe(zip('blueridge.zip'))
        .pipe(gulp.dest(paths.package.dest))
}

export const clean = () => del(['dist', 'package']);

export const watch = () => {
    gulp.watch('src/assets/scss/**/*.scss', styles);
    gulp.watch('src/assets/js/**/*.js', gulp.series(scripts, reload));
    gulp.watch('**/*.php', reload);
    gulp.watch(paths.images.src, gulp.series(images, reload));
    gulp.watch(paths.other.src, gulp.series(copy, reload));
}

export const dev = gulp.series(clean, gulp.parallel(styles, scripts, images, copy), serve, watch);
export const build = gulp.series(clean, gulp.parallel(styles, scripts, images, copy));
export const bundle = gulp.series(build, compress);

export default dev;