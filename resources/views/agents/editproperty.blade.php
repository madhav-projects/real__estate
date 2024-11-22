<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f7f9fc;
            font-family: 'Arial', sans-serif;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .container { margin-top: 50px; }
        .modal-content { border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        .modal-header { background-color: #3c2626; color: white; text-align: center; }
        .form-control { border-radius: 8px; border: 1px solid #ced4da; }
        .btn-primary { background-color: #3c2626; border: none; width: 48%; }
        .btn-secondary { background-color: #3c2626; border: none; width: 48%; margin-right: 4%; }
        .btn-primary:hover { background-color: #3c2626; }
    </style>
</head>

<body>
    <div class="container">
        <!-- Modal for Editing Property -->
        <div class="modal fade" id="editPropertyModal" tabindex="-1" role="dialog" aria-labelledby="editPropertyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPropertyModalLabel">Edit Property Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Edit Property Form -->
                        <form id="propertyForm">
                            @csrf
                            <input type="hidden" id="editPropertyId" value="{{ $property->id }}">
                            <div class="mb-3">
                                <label for="editPropertyType" class="form-label">Property Type</label>
                                <input type="text" class="form-control" id="editPropertyType" value="{{ $property->property_type }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="editSellingType" class="form-label">Selling Type</label>
                                <input type="text" class="form-control" id="editSellingType" value="{{ $property->selling_type }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="editAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="editAddress" value="{{ $property->address }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="editCity" class="form-label">City</label>
                                <input type="text" class="form-control" id="editCity" value="{{ $property->city }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="editStatus" class="form-label">Status</label>
                                <select class="form-control" id="editStatus" required>
                                    <option value="Available" {{ $property->status == 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Soldout" {{ $property->status == 'Soldout' ? 'selected' : '' }}>Soldout</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editPrice" class="form-label">Price</label>
                                <input type="text" class="form-control" id="editPrice" value="{{ $property->price ?? '' }}">
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" id="cancelButton">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            // Trigger modal on page load
            $('#editPropertyModal').modal('show');

            // Form submission handler
            $('#propertyForm').on('submit', function (e) {
                e.preventDefault();  // Prevent default form submission

                const propertyId = $('#editPropertyId').val();  // Property ID from hidden input
                const updatedProperty = {
                    _token: '{{ csrf_token() }}',  // Include CSRF token
                    property_type: $('#editPropertyType').val(),
                    selling_type: $('#editSellingType').val(),
                    address: $('#editAddress').val(),
                    city: $('#editCity').val(),
                    status: $('#editStatus').val(),
                    price: $('#editPrice').val()
                };

                $.ajax({
                    url: '/update_property/' + propertyId,
                    method: 'POST',
                    data: updatedProperty,
                    success: function (response) {
                        if (response.success) {
                            alert('Property updated successfully!');
                            window.location.href = '/show_properties';
                        } else {
                            alert('Failed to save property details. Please try again.');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error saving property details:', error);
                        alert('Failed to save property details. Please try again.');
                    }
                });
            });

            // Cancel button click handler
            $('#cancelButton').on('click', function () {
                window.location.href = '/show_properties';
            });
        });
    </script>
</body>
</html>
