
(() => {

    const NovaPasswordViewerClassName = "NovaPasswordViewer";

    let NovaPasswordViewerElements = document.getElementsByClassName( NovaPasswordViewerClassName );
    if ( NovaPasswordViewerElements ) {

        for ( let password of NovaPasswordViewerElements ) {
            if ( 'input' !== password.tagName.toLowerCase() && 'password' !== password.type.toLowerCase() ) continue;

            let container = document.createElement( 'div' );
            container.classList.add("NovaPasswordViewer__icon-container");
            container.style.position = "absolute";
            container.style.top = "7px";
            container.style.right = "25px";

            let icon = document.createElement( 'i' );
            icon.classList.add("NovaPasswordViewer__icon");
            icon.classList.add("fas");
            icon.classList.add("fa-eye");
            icon.style.cursor = "pointer";

            let surroundingElement = document.createElement( 'div' );
            surroundingElement.style.position = "relative";

            icon.addEventListener( "click", ( ) => {
                icon.classList.toggle("fa-eye");
                icon.classList.toggle("fa-eye-slash");

                password.type = "text" === password.type ? "password" : "text";
            });

            password.parentNode.insertBefore(surroundingElement, password);
            surroundingElement.appendChild(password);

            container.appendChild( icon );
            surroundingElement.appendChild(container);
        }
    }

})();
