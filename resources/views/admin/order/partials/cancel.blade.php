
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Telephone</th>
        <th>Address</th>
        <th>Total</th>
        <th>Status</th>
        <th>Order date</th>
        {{--        <th>Shipper</th>--}}
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->tel}}</td>
            <td>{{$order->address}}</td>
            <td>{{$order->total}}</td>
            <td class="status">
                @if($order->status == 1)
                    <p class="pending">PENDING</p>
                @elseif($order->status == 2)
                    <p class="approved">APPROVED</p>
                @elseif($order->status == 3)
                    <p class="shipping">SHIPPING</p>
                @elseif($order->status == 4)
                    <p class="cancel">FINISH</p>
                @elseif($order->status == 5)
                    <p class="cancel">CANCEL</p>
                @endif
            </td>
            <td>{{ date('d-m-Y',strtotime($order->order_date))}}</td>
            {{--            <td>{!! \App\User::findOrFail($order->shipper_id)->name !!}</td>--}}
            <td>
                <a href="{{route('order.show',$order->id)}}" class="btn btn-primary">Show</a> |
                <form action="{!! route('order.restore',$order->id) !!}" method="post" style="display: inline">
                    @csrf
                    <button type="submit" class="btn btn-warning">Restore</button>
                </form>
            </td>
        </tr>
    @endforeach
    <tr>
        @if(!count($orders)>0)
            <td colspan="3"><h2>No orders</h2></td>
        @endif
    </tr>

    </tbody>
</table>