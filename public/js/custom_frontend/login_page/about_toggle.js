function toggleAbout(showFull = true) {

    const aboutShort = document.getElementById('aboutShort');
    const aboutFull = document.getElementById('aboutFull');

    if (!aboutShort || !aboutFull) {
        console.warn('About toggle elements not found.');
        return;
    }

    if (showFull) {

        aboutShort.style.display = 'none';
        aboutFull.style.display = 'block';

        aboutFull.style.opacity = '0';

        setTimeout(() => {
            aboutFull.style.transition = 'opacity .3s ease';
            aboutFull.style.opacity = '1';
        }, 10);

    } else {

        aboutFull.style.display = 'none';
        aboutShort.style.display = 'block';

        aboutShort.style.opacity = '0';

        setTimeout(() => {
            aboutShort.style.transition = 'opacity .3s ease';
            aboutShort.style.opacity = '1';
        }, 10);

    }
}

/**
 * Optional initialization
 */
document.addEventListener('DOMContentLoaded', function () {

    const aboutShort = document.getElementById('aboutShort');
    const aboutFull = document.getElementById('aboutFull');

    if (aboutShort) {
        aboutShort.style.display = 'block';
    }

    if (aboutFull) {
        aboutFull.style.display = 'none';
    }

});
;
