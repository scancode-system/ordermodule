<div class="list-group list-group-accent">
    <div class="list-group-item list-group-item-accent-secondary bg-light text-center font-weight-bold text-muted text-uppercase small">Pedidos</div>
    <a href="{{ route('reports.orders') }}" class="list-group-item list-group-item-accent-dark list-group-item-divider list-group-item-action">Simples</a>
    <a href="{{ route('reports.orders.full') }}" class="list-group-item list-group-item-accent-dark list-group-item-divider list-group-item-action">Completo</a>
</div>
<div class="list-group list-group-accent">
    <div class="list-group-item list-group-item-accent-secondary bg-light text-center font-weight-bold text-muted text-uppercase small">Items</div>
    <a href="{{ route('reports.items') }}" class="list-group-item list-group-item-accent-dark list-group-item-divider list-group-item-action">Simples</a>
    <a href="{{ route('reports.items.full') }}" class="list-group-item list-group-item-accent-dark list-group-item-divider list-group-item-action">Detalhado</a>
</div>
<div class="list-group list-group-accent">
    <div class="list-group-item list-group-item-accent-secondary bg-light text-center font-weight-bold text-muted text-uppercase small">Produtos</div>
    <a href="{{ route('reports.products') }}" class="list-group-item list-group-item-accent-dark list-group-item-divider list-group-item-action">Simples</a>
</div>