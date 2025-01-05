@include("admin.sidebar")

<div class="container table-responsive py-5">
    <table class="table table-bordered table-hover">
        <thead class="thead bg-warning">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Order Details</th>
                <th scope="col">Price</th>
                <th scope="col">Mode</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
    @forelse($order as $key => $order)
    <tr>
        <th scope="row">{{ $key + 1 }}</th>
        <td>{{ $order->name }}</td>
        <td>{{ $order->meal }} (x{{ $order->qty }})</td>
        <td>£ {{ number_format($order->price, 2) }}</td>
        <td>{{ $order->paymenttype }}</td>
        <td><span class="badge badge-success">{{ $order->status }}</span></td>
        <td>
            <a href="{{ url('/deleteorder', $order->id) }}">
                <button type="button" class="btn-sm btn-danger">Delete <i class="fa fa-trash"></i></button>
            </a>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6" class="text-center">No orders found.</td>
    </tr>
    @endforelse
</tbody>


    </table>
</div>
@include("admin.footer")

