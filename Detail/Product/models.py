from django.db import models


# Create your models here.
class Product(models.Model):
    name = models.CharField(max_length=255)
    detail = models.TextField()
    price = models.FloatField()
    image_url = models.CharField(max_length=255)
    create_date = models.DateTimeField(auto_now=True)
    is_sync_with_search = models.BooleanField(default=False)
