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
            "id": "4295",
            "properties": {"name": "Northern Cape", "abbr": "NC"},
            "geometry": null
        },
        {
            "type": "Feature",
            "id": "4294",
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

// Default province style
var defaultStyle = {
    weight: 2,
    color: '#63ab84',
    dashArray: '',
    fillOpacity: 0.5
};

// Get the province title h1 and province result div
let provinceTitle = document.getElementById("province_name");
let provinceResult = document.getElementById("province_result");

// initialize the map on the "map" div with a given center and zoom
let map = L.map('map').setView([-29.459, 24.785], 5);

var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 5,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="https://mapit.code4sa.org/#api-by_area_id">Powered by MapIt</a>'
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

// Mouseover event that highlights the province that's currently hovered over
function highlightProvince(e)
{
    e.target.setStyle(
        {
            weight: 5,
            color: '#434acc',
            dashArray: '',
            fillOpacity: 0.7
        }
    );

    e.target.bringToFront();
}

// Mouseout event that clears the province that was hovered over's highlight
function resetProvince(e)
{
    e.target.setStyle(defaultStyle);
}

// Adds a party to the results div
function createResultElement(logo, link, abbr)
{
    const element = document.createElement("a");
    element.href = link;
    const image = document.createElement("img");
    image.src = logo;
    image.alt = `Logo of ${abbr}`;
    image.classList.add("img_result");
    element.appendChild(image);
    provinceResult.appendChild(element);
}

// Function that retrieves the information of each party's php page
function getPartyInfo(party_abbr)
{
    fetch(`../model/partyinfo.json`)
    .then(response => {
        return response.json();
    })
    .then(data => {
        let party_array = data["party_info"];
        for (let i = 0; i < party_array.length; i++)
        {
            let current_party = party_array[i];
            if (current_party.abbr.toLowerCase() === party_abbr.toLowerCase())
            {
                createResultElement(current_party.logo, `party.php?party=${current_party.abbr.toLowerCase()}`, current_party.abbr);
                break;
            }
        }
    });
}

// Function that takes the abbreviation of a province and returns the information needed
// to generate the three parties needed for each province
function returnProvinceResults(abbr)
{
    switch (abbr)
    {
        case "WC":
            getPartyInfo("DA");
            getPartyInfo("PA");
            getPartyInfo("FFPlus");
            break;
        case "EC":
            getPartyInfo("DA");
            getPartyInfo("EFF");
            getPartyInfo("PAC");
            break;
        case "NC":
            getPartyInfo("DA");
            getPartyInfo("PA");
            getPartyInfo("FFPlus");
            break;
        case "KZN":
            getPartyInfo("IFP");
            getPartyInfo("DA");
            getPartyInfo("MK");
            break;
        case "FS":
            getPartyInfo("DA");
            getPartyInfo("EFF");
            getPartyInfo("FFPlus");
            break;
        case "NW":
            getPartyInfo("EFF");
            getPartyInfo("DA");
            getPartyInfo("PA");
            break;
        case "GP":
            getPartyInfo("DA");
            getPartyInfo("EFF");
            getPartyInfo("ActionSA");
            break;
        case "MP":
            getPartyInfo("EFF");
            getPartyInfo("DA");
            getPartyInfo("FFPlus");
            break;
        case "LM":
            getPartyInfo("DA");
            getPartyInfo("EFF");
            getPartyInfo("FFPlus");
            break;
    }
}

// Onclick event for each province
function onClickProvince(e)
{
    // Get the target's feature property and get the province's name
    provinceTitle.textContent = e.target.feature.properties.name;

    // Reset the result div
    provinceResult.innerHTML = "";

    // Get the target's feature property and get the province's abbr to load the actual result
    returnProvinceResults(e.target.feature.properties.abbr);
}

// Bring all the events together in one function.

function eventsWrapper(feature, layer) {
    layer.on({
        mouseover: highlightProvince,
        mouseout: resetProvince,
        click: onClickProvince
    });
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
   L.geoJson(provinceData, {
    style: defaultStyle,
    onEachFeature: eventsWrapper
  }).addTo(map);

  // Remove loading message
  document.getElementById("map_load").remove();
}

// Call the function to update province geometries
updateProvinceGeometries();