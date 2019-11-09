/* GROUP ATOMS / ACCESSIBILITY / ADD SKIP LINKS
=================================================== */
/* Notes...

    - Add some Skip Links to get to main content quickly

*/
// Always add 'Skip to main'
document.querySelector('html').insertAdjacentHTML('afterbegin', '<a href="#main" class="c-skip-to-content" title="Skip to main">Skip to main</a>');

// If there is editable content i.e. we're not on something like 'Pages'
if(document.getElementById('content-edit')){
    // [1] Let's get past the first divider, so add an ID to the first element after that 
    document.querySelector('#content-edit h2 + *').id = 'editable-content';
    document.querySelector('html').insertAdjacentHTML('afterbegin', '<a href="#editable-content" class="c-skip-to-content" title="Skip to content">Skip to content</a>');
}