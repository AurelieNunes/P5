class WeatherWidget {
  constructor(city) {
    this.city = city;
    this.weatherWidgetHTML = document.getElementById("widget");
  }

  async init() {
    const apiData = await this.getApiData();
    const { main, name, weather } = apiData;
    this.setHtmlWidget(main, name, weather);
  }

  async getApiData() {
    const response = await fetch(
      `http://api.openweathermap.org/data/2.5/weather?q=${this.city}&lang=fr&appid=53c2d33882612dbd7d072b8b781b1851&units=metric`
    );
    const data = await response.json();

    return data;
  }

  createNewHTMLElement(
    htmlTypeNode,
    content,
    parent,
    { className = undefined, id = undefined } = {}
  ) {
    const node = document.createElement(htmlTypeNode);
    node.textContent = content;
    if (className !== undefined) {
      node.classList.add(className);
    }
    if (id !== undefined) {
      node.id = id;
    }
    parent.appendChild(node);
  }

  getImageToDisplay(id) {
    // Seulement le premier chiffre de l'id nous interesse.
    // Je le convertie donc en nombre puis je récupère la premiere lettre.
    // id = 805 -> firstNumber = 8
    const firstNumber = id.toString()[0];
    let image;
    // + pour reconvertire notre string en number
    switch (+firstNumber) {
      case 2:
        image =
          "https://www.crushpixel.com/big-static18/preview4/thunderstorm-icon-3082386.jpg";
        break;
      case 3:
        image = "https://meteo45.com/images/gouttes-de-pluie.jpg";
        break;
      case 5:
        image =
          "https://www.leparisien.fr/resizer/l6z2vq5QMUvh95Ok0BQlM_3tOzY=/932x582/cloudfront-eu-central-1.images.arcpublishing.com/leparisien/6JWLIR5ISMTAWAWWDIBR2B6LKY.jpg";
        break;
      case 6:
        image =
          "https://media.skirentalsolution.sport2000.fr/images/cache/cms_image_runtime/rc/DawZYPOe/cms/meteo-des-neiges.jpg";
        break;
      case 7:
        image =
          "https://static.lpnt.fr/images/2020/02/12/20051122lpw-20051178-article-vaguessubmersion-vent-violent-meteo-france-jpg_6906927_660x281.jpg";
        break;
      case 8:
        image =
          "https://acteurs.tourismebretagne.bzh/wp-content/uploads/2019/09/62b0677a23_129709_soleil-brille-1080x675.jpg";
      default:
        break;
    }

    return image
  }

  setHtmlWidget(main, name, weather) {
    const { createNewHTMLElement, weatherWidgetHTML } = this;
    const { temp } = main;
    const { description, id } = weather[0];
    const image = this.getImageToDisplay(id);

    createNewHTMLElement("p", name, weatherWidgetHTML, {
      className: "widgetCityName",
    });
    createNewHTMLElement(
      "p",
      `${temp} °c`,
      weatherWidgetHTML,
      {
        className: "widgetCurrentTemp",
      }
    );

    createNewHTMLElement("p", description, weatherWidgetHTML, {
      className: "widgetCurrentWeather",
    });
    this.weatherWidgetHTML.style.background = `url(${image})`
  }
}
const weatherWidget = new WeatherWidget("narbonne");
weatherWidget.init();
