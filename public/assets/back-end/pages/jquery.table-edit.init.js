/**
 * Theme: Amezia - Responsive Bootstrap 4 Admin Dashboard
 * Author: Themesbrand
 * Edit Table
 */

 
$(function () {
    $('#my-table').Tabledit({
      columns: {
        identifier: [0, 'id'],                    
        editable: [[1, 'col1'], [2, 'col1'], [3, 'col3']]
      }
    });
  
    $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
   
  });

 