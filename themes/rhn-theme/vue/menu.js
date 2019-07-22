var mainMenu = new Vue({
  el: '#main-menu',
  data: {
    show: false
  },
  created: function() {
    let companyMenuItems = document.getElementsByClassName('rhn-company-menu-item');
    
    Array.from(companyMenuItems).map(item => {
      item.classList.add('fi-b-tel6');
      Array.from(item.children).map(child => {
        if (child.tagName == 'A' && child.hasAttribute('title')) {
          child.classList.add('text-bld-subhead', 'pb-small', 'rhn-company-menu__headline');
        }
      });

      // console.log(item.children);
      // Array.from(item.children).map(child => {
      //   if( child.tagName == 'A' ) {
      //     let attr = child.getAttribute('title');
      //   }
      // });
    });
  }
})