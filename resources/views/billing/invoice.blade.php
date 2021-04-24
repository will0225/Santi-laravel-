<div>
    <h3 style="text-align: center">Customer Invoice</h3>
    <h5>customer name: {{$customer->name}}</h5>
    <h5>customer number: #{{$customer->id}}</h5>
    <h5>amount: {{$amount}}EUR</h5>
    <h5>type: {{$type?"transaction":"add fund"}}</h5>
    <h5>card id: #{{$card_id}}</h5>
    <h5>create date: {{$create_at}}</h5>
</div>