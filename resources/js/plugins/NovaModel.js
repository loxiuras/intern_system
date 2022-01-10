
(() => {

    /** ToDo: Order all attributes into functions; **/

    const NovaModelClassName = 'NovaModel';
    let NovaModelElements = document.getElementsByClassName( NovaModelClassName );

    const showClassName = 'show';

    const dataNovaModelBodyClassDataName = 'data-nova-model-body-class';
    const dataNovaModelTargetDataName    = 'data-nova-model-target';

    if ( NovaModelElements ) {

        for ( let element of NovaModelElements ) {
            let dataNovaModelBodyClass = null !== element.getAttribute( dataNovaModelBodyClassDataName ) ? String( element.getAttribute( dataNovaModelBodyClassDataName ) ) : null;
            let dataNovaModelTarget    = null !== element.getAttribute( dataNovaModelTargetDataName ) ? String( element.getAttribute( dataNovaModelTargetDataName ) ) : null;

            if ( null === dataNovaModelTarget ) continue;
            let model = document.getElementById( dataNovaModelTarget );

            if ( model ) {
                let backdrop = document.getElementById( `${dataNovaModelTarget}BackDrop` );

                element.addEventListener( "click", () => {
                    model.style.display = 'block';

                    if ( dataNovaModelBodyClass ) {
                        document.body.classList.add( dataNovaModelBodyClass );
                    }

                    setTimeout(() => {
                        if ( backdrop ) {
                            backdrop.style.display = 'block';
                            backdrop.classList.add( showClassName );
                        }

                        model.classList.add( showClassName );
                    }, 500);
                });

                model.addEventListener("click", ( event ) => {

                    if ( dataNovaModelTarget === event.target.getAttribute('id') ) {
                        model.classList.remove( showClassName );
                        backdrop.classList.remove( showClassName );

                        setTimeout(() => {
                            model.style.display = 'none';
                            backdrop.style.display = 'none';

                            if (dataNovaModelBodyClass) {
                                document.body.classList.remove(dataNovaModelBodyClass);
                            }
                        }, 500);
                    }
                });
            }
        }
    }

})();
