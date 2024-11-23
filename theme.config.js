const { transform } = require('theme-json-generator');
const { theme } = require('./tailwind.config.js');

module.exports = {
  version: 3,
  settings: {
    "appearanceTools": true,
    "dimensions": {
      "aspectRatio": true
    },
    "layout": {
      "contentSize": "70%",
      "wideSize": "90%"
    },
    "position": {
      "sticky": false
    },
    "color": {
      "palette": transform("palette", theme.extend.colors)
    },
    "typography": {
      "defaultFontSizes": false,
      "customFontSize": false,
      "fontStyle": false,
      "fontWeight": false,
      "letterSpacing": false,
      "lineHeight": false,
      "dropCap": false,
      "fontFamilies": [
        {
          name: "Display",
          slug: "display",
          fontFamily: theme.fontFamily.display
        },
        {
          name: "Comic Sans",
          slug: "comic",
          fontFamily: theme.fontFamily.comic
        }
      ]
    },
    "spacing": {
      "blockGap": "true",
      "margin": "true",
      "padding": "true"
    },
    "shadow": {
      "defaultPresets": false
    }
  },
  "styles": {
    "blocks": {
      "core/button": {
        "color":{
          "background": theme.extend.colors.primary,
        },
        "spacing": {
          "padding": {
            "top": "7px",
            "right": "10px",
            "bottom": "7px",
            "left": "10px"
          }
        }
      }
    }
  }
};