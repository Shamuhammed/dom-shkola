export function accordion() {
   $( document ).ready(function() {
      console.log("accordion functions ready!");
         
      const $accordionItems = $(".accordion__item");
      $accordionItems.each(function (index) {
         $(this).click(function () {
            const $currentItem = $(this);
            $currentItem.toggleClass('_show');
            removeClassAccordionItems(index)
         });
      });

      function removeClassAccordionItems(currentItemindex) {
         $accordionItems.each(function (index) {
            if (index !== currentItemindex) {
               $(this).removeClass('_show');
            }
         })
      }
         
  });
}
