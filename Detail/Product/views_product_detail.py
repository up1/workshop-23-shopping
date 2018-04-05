from product.model import Product

import requests


def product_detail(request):
    product_id = request.GET.get(id, -1)

