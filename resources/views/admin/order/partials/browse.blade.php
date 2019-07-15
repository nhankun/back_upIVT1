
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
                    <p class="cancel">CANCEL</p>
                @endif
            </td>
            <td>{{ date('d-m-Y',strtotime($order->order_date))}}</td>
            <td>
                <a href="{{route('order.show',$order->id)}}" class="btn btn-primary">Show</a>
                |
                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#myModal-{{$order->id}}">Xử lý</a>
                <!-- The Modal -->
                <div class="modal fade" id="myModal-{{$order->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Xử lý đơn hàng số: {{$order->id}}</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <form action="{{route('order.processing',$order->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="shipper_id" class="col-6">Chọn nhân viên giao đơn hàng <sup class="title-danger">*</sup>:</label>
                                        <select name="shipper_id" id="shipper_id" class="form-control col-6" required>
                                            @foreach($shippers as $shipper)
                                                <option value="{{$shipper->id}}">{{$shipper->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Xử lý</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- END Modal -->
                |
                <form action="{{route('order.cancel',$order->id)}}" method="post" style="display: inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-warning">Cancel</button>
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