# mu-plugins

A collection of [must-use plugins](https://wordpress.org/documentation/article/must-use-plugins/) for WordPress.

## Usage

Each plugin is a single independent PHP file, so you can cherry-pick the ones you need.

To install a plugin, upload it to `WPMU_PLUGIN_DIR`, which is `/wp-content/mu-plugins/` by default.

To disable a plugin, either delete the file or move it to a subdirectory (e.g. `/wp-content/mu-plugins/disabled/`).

### Example usage

```
└─📂 wp-content
  ├─ 📁 languages
  ├─ 📂 mu-plugins
  │  ├─ 📂 disabled
  │  │  └─ 📄 single-theme.php
  │  ├─ 📄 admin-toolbar.php
  │  ├─ 📄 disable-comments.php
  │  ├─ 📄 disable-emoji.php
  │  ├─ 📄 disable-xml-rpc.php
  │  └─ 📄 html-tidy.php
  │  └─ 📄 white-label.php
  ├─ 📁 plugins
  ├─ 📁 themes
  └─ 📁 uploads
```

## License

Licensed under [GNU General Public License v2](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html) or later.
