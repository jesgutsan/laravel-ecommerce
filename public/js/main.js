// Funció per a actualitzar els ítems de la cistella
$(".btn-update-item").on('click', function(e){
    e.preventDefault(); // Evitem que l'enllaç recarregue la pàgina per defecte

    var id = $(this).data('id'); // Obtenim l'ID del producte
    var href = $(this).data('href'); // Obtenim la ruta base d'actualització
    var quantity = $("#product_" + id).val(); // Llegim el valor del camp numèric

    // Redirigim a la URL completa: /cart/update/slug/quantitat
    window.location.href = href + "/" + quantity;
});

