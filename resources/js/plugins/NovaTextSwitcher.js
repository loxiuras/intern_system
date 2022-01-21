
(() => {

    const NovaTextSwitcherClassName = 'NovaTextSwitcher';

    let NovaTextSwitcherClassNameElements = document.getElementsByClassName( NovaTextSwitcherClassName );
    if ( NovaTextSwitcherClassNameElements ) {

        const wrapInnerHtml = ( element ) => {
          let value = element.innerHTML;

          let wrapper = document.createElement("span");
              wrapper.classList.add("NovaTextSwitcher--wrapper");
              wrapper.innerHTML = value;

              console.log( wrapper );

              wrapper.parentNode.innerHTML = wrapper;
        };

        for ( let switcher of NovaTextSwitcherClassNameElements ) {
            let dataIcon      = switcher.getAttribute("data-icon");
            let dataCloseIcon = switcher.getAttribute("data-close-icon");
            let dataText      = switcher.getAttribute("data-text");

            wrapInnerHtml( switcher )
        }
    }

})();
