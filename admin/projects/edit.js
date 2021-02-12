$(function(){
   $('[data-category]').on('click', editCategoryModal);
   $('[data-level]').on('click', editLevelModal); 
});

function editCategoryModal()
{
    //Obtner id
    var category_id = $(this).data('category');
    $('#category_id').val(category_id);
    //Obtner name
    var category_name = $(this).parent().prev().text();
    $('#category_name').val(category_name);

    //mostrar en el modal
    $('#modalEditCategory').modal('show');
}

function editLevelModal()
{
    //Obtner id
    var level_id = $(this).data('level');
    $('#level_id').val(level_id);
    //Obtner name
    var level_name = $(this).parent().prev().text();
    $('#level_name').val(level_name);

    //mostrar en el modal
    $('#modalEditLevel').modal('show');
}