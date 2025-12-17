$images = @{
    "paris.jpg" = "https://images.unsplash.com/photo-1499856871940-b3ded97543a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
    "casablanca.jpg" = "https://images.unsplash.com/photo-1539281207223-2895f5539d09?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
    "marrakech.jpg" = "https://images.unsplash.com/photo-1597212001799-ac87b464a93c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
    "alger.jpg" = "https://images.unsplash.com/photo-1629837943003-82a9db58d844?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
    "rome.jpg" = "https://images.unsplash.com/photo-1552832230-c0197dd311b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
    "lisbonne.jpg" = "https://images.unsplash.com/photo-1590623349942-5e6093554e26?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
    "haiti.jpg" = "https://images.unsplash.com/photo-1548574505-5e239809ee19?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
    "default.jpg" = "https://images.unsplash.com/photo-1533903345306-15d1c30952de?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
}

foreach ($key in $images.Keys) {
    echo "Downloading $key..."
    curl.exe -L -o "assets/images/activities/$key" $images[$key]
}
