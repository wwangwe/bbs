# example/urls.py
from django.urls import path

from livescreen.views import index


urlpatterns = [
    path('', index),
]