// This object is used to create the interactive provinces on the map
// The IDs for every feature is taken from the result of every province from 
// https://mapit.code4sa.org/#api-by_area_id
var provinceData = {
    "type": "FeatureCollection",
    "features":[
        {
            "type": "Feature",
            "id": "4288",
            "properties": {"name": "Eastern Cape", "abbr": "EC"},
            "geometry": null
        },
        {
            "type": "Feature",
            "id": "4289",
            "properties": {"name": "Free State", "abbr": "FS"},
            "geometry": null
        },
        {
            "type": "Feature",
            "id": "4290",
            "properties": {"name": "Gauteng", "abbr": "GP"},
            "geometry": null
        },
        {
            "type": "Feature",
            "id": "4291",
            "properties": {"name": "KwaZulu-Natal", "abbr": "KZN"},
            "geometry": null
        },
        {
            "type": "Feature",
            "id": "4292",
            "properties": {"name": "Limpopo", "abbr": "LM"},
            "geometry": null
        },
        {
            "type": "Feature",
            "id": "4293",
            "properties": {"name": "Mpumalanga", "abbr": "MP"},
            "geometry": null
        },
        {
            "type": "Feature",
            "id": "4294",
            "properties": {"name": "Northern Cape", "abbr": "NC"},
            "geometry": null
        },
        {
            "type": "Feature",
            "id": "4295",
            "properties": {"name": "North West", "abbr": "NW"},
            "geometry": null
        },
        {
            "type": "Feature",
            "id": "4296",
            "properties": {"name": "Western Cape", "abbr": "WC"},
            "geometry": null
        }
    ]
};

// Get the province title h1 and province result div
let provinceTitle = document.getElementById("province_name");
let provinceResult = document.getElementById("province_result");

// initialize the map on the "map" div with a given center and zoom
let map = L.map('map').setView([-29.459, 24.785], 5);

var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

// Fetch province geometries and assign them to the features
async function fetchProvinceGeometry(url) {
    try {
        // Do async await to retrieve GeoJSON of every province
        const response = await fetch(url);
        const data = await response.json();
        return data;
    } catch (error) {
        console.error("Error fetching province geometry:", error);
        return null;
    }
}

// Update provinceData with fetched geometries
async function updateProvinceGeometries() {
    // Loop through the provinceData object and get the ids from every feature to
    // get the GeoJSON of every province and put it on the map
    for (let feature of provinceData.features) {
        const url = `https://mapit.code4sa.org/area/${feature.id}.geojson`;
        const geometry = await fetchProvinceGeometry(url);
        if (geometry) {
            feature.geometry = geometry;
        }
    }

    // Once all geometries are fetched, add GeoJSON data to the map
    L.geoJson(provinceData).addTo(map);
}

// Call the function to update province geometries
updateProvinceGeometries();
