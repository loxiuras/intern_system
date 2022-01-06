
(() => {

    const navLinkClassName   = 'nav-link';
    const activeClassName    = 'active';
    const collapsedClassName = 'collapsed';
    const showClassName      = 'show';

    const ariaControlsName = 'aria-controls'
    const ariaExpandedName = 'aria-expanded'

    let navLinkElements = document.getElementsByClassName( navLinkClassName );
    if ( navLinkElements ) {

        for ( let navLink of navLinkElements ) {
            let ariaControls = navLink.getAttribute(ariaControlsName);

            if ( ariaControls ) {
                let collapseElement = document.getElementById( ariaControls );

                navLink.addEventListener('click', ( event ) => {
                    event.preventDefault();

                    navLink.classList.toggle(activeClassName);
                    navLink.classList.toggle(collapsedClassName);
                    navLink.setAttribute( ariaExpandedName, ( navLink.getAttribute( ariaExpandedName ) === 'true' ? 'false' : 'true' ) );

                    collapseElement.classList.toggle("show");
                })
            }
        }
    }

})();
