import './bootstrap';
import Swal from 'sweetalert2';

$(document).ready(function () {
    var productsList = $('#product-list');
    if (productsList.length > 0) {
        var productsListDatatable = productsList.dataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: productsList.data('action'),
            },
            columns: [
                {
                    data: 'name',
                    name: 'name',
                    className: 'align-middle'
                },
                {
                    data: 'category',
                    name: 'category',
                    className: 'align-middle'
                },
                {
                    data: 'price',
                    name: 'price',
                    className: "align-middle",
                },
                {
                    data: 'address',
                    name: 'address',
                    className: 'align-middle'
                },
                {
                    data: "action",
                    name: 'actions',
                    className: 'align-middle',
                    searchable: false,
                    sortable: false,
                }
            ]
        });

        $(document).on('click', '.delete-product', function (event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = $(this).data('url');
                    let id = $(this).data('id');
                    axios.post(url, {'product_id': id}).then(function () {
                        productsListDatatable.api().ajax.reload();
                        Swal.fire({
                            title: 'Success',
                            text: 'Product Deleted Successfully.',
                            icon: 'success',
                            showCancelButton: false,
                            cancelButtonText: 'Ok !!',
                            confirmButtonColor: '#3085d',
                            cancelButtonColor: '#d33'
                        })
                    }).catch(function (error) {
                        console.log(error);
                    })
                }
            })
        })
    }
});
