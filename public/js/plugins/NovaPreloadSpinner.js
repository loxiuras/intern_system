
(() => {

    const NovaPreloadSpinnerClassName = 'NovaPreloadSpinner';
    let NovaPreloadSpinnerElements = document.getElementsByClassName( NovaPreloadSpinnerClassName );

    const dataTimeDataName = 'data-time';

    if ( NovaPreloadSpinnerElements ) {

        for ( let element of NovaPreloadSpinnerElements ) {
            let dataTime = null !== element.getAttribute( dataTimeDataName ) ? parseInt( element.getAttribute( dataTimeDataName ) ) : 0;

            setTimeout(() => {
                element.classList.remove( NovaPreloadSpinnerClassName );
            }, dataTime);
        }
    }

})();
