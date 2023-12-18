var provinceData = {
    "type":"FeatureCollection",
    "features":[
        {
            "type": "Feature",
            "id": "01",
            "properties": {"name": ""},
            "geometry": {"type": "Polygon", "coordinates": [
                [
                    []
                ]
            ]}
        },
        {
            "type": "Feature",
            "id": "02",
            "properties": {"name": ""},
            "geometry": {"type": "Polygon", "coordinates": [
                [
                    []
                ]
            ]}
        },
        {
            "type": "Feature",
            "id": "03",
            "properties": {"name": ""},
            "geometry": {"type": "Polygon", "coordinates": [
                [
                    []
                ]
            ]}
        },
        {
            "type": "Feature",
            "id": "04",
            "properties": {"name": ""},
            "geometry": {"type": "Polygon", "coordinates": [
                [
                    []
                ]
            ]}
        },
        {
            "type": "Feature",
            "id": "05",
            "properties": {"name": ""},
            "geometry": {"type": "Polygon", "coordinates": [
                [
                    []
                ]
            ]}
        },
        {
            "type": "Feature",
            "id": "06",
            "properties": {"name": ""},
            "geometry": {"type": "Polygon", "coordinates": [
                [
                    []
                ]
            ]}
        },
        {
            "type": "Feature",
            "id": "07",
            "properties": {"name": ""},
            "geometry": {"type": "Polygon", "coordinates": [
                [
                    []
                ]
            ]}
        },
        {
            "type": "Feature",
            "id": "08",
            "properties": {"name": ""},
            "geometry": {"type": "Polygon", "coordinates": [
                [
                    []
                ]
            ]}
        },
        {
            "type": "Feature",
            "id": "09",
            "properties": {"name": ""},
            "geometry": {"type": "Polygon", "coordinates": [
                [
                    []
                ]
            ]}
        }
    ]
};

var map = L.map('map').setView(
    [-29.459, 24.785], 6
);

var tiles = L.tileLayer('https://tile.openstreetmap.org/6/-29.688/21.028.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

L.geoJson(provinceData).addTo(map);