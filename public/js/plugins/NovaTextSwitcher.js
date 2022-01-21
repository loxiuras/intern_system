
(() => {

    const NovaTextSwitcherClassName = 'NovaTextSwitcher';

    let NovaTextSwitcherClassNameElements = document.getElementsByClassName( NovaTextSwitcherClassName );
    if ( NovaTextSwitcherClassNameElements ) {

        for ( let switcher of NovaTextSwitcherClassNameElements ) {
            let dataIcon        = switcher.getAttribute('data-icon');
            let dataCloseIcon   = switcher.getAttribute('data-close-icon');
            let dataText        = switcher.getAttribute('data-text');
            let dataStorageText = switcher.innerHTML;

            switcher.innerHTML = "";

            let icon = document.createElement("i");
            icon.setAttribute( "data-stage", "first" );
            icon.style.cursor = "pointer";
            icon.classList.add( "text-sm" );
            for( let className of dataIcon.split(" ") ) icon.classList.add( className );

            let closeIcon = document.createElement("i");
            closeIcon.setAttribute( "data-stage", "last" );
            closeIcon.style.display = "none";
            closeIcon.style.cursor = "pointer";
            closeIcon.classList.add( "text-sm" );
            for( let className of dataCloseIcon.split(" ") ) closeIcon.classList.add( className );

            let text = document.createElement("span");
            text.classList.add( `${NovaTextSwitcherClassName}--text` );
            text.classList.add( "text-sm" );
            text.classList.add( "ms-2" );
            text.innerHTML = dataStorageText;

            icon.addEventListener( "click", () => {
                icon.style.display      = "none";
                closeIcon.style.display = "inline-block";

                text.innerHTML = dataText;
            });
            closeIcon.addEventListener( "click", () => {
                icon.style.display      = "inline-block";
                closeIcon.style.display = "none";

                text.innerHTML = dataStorageText;
            });

            let wrapper = document.createElement( "span" );
            wrapper.classList.add( `${NovaTextSwitcherClassName}--wrapper` );

            wrapper.appendChild( icon );
            wrapper.appendChild( closeIcon );
            wrapper.appendChild( text );

            switcher.appendChild( wrapper );
        }
    }

})();
