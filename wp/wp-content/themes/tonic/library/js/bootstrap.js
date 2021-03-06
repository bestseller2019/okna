/**
 * Bootstrap.js by @fat & @mdo
 * plugins: bootstrap-transition.js, bootstrap-dropdown.js
 * Copyright 2012 Twitter, Inc.
 * http://www.apache.org/licenses/LICENSE-2.0.txt
 */
!
function(a) {
	a(function() {
		a.support.transition = function() {
			var a = function() {
					var a = document.createElement("bootstrap"),
						b = {
							WebkitTransition: "webkitTransitionEnd",
							MozTransition: "transitionend",
							OTransition: "oTransitionEnd otransitionend",
							transition: "transitionend"
						},
						c;
					for (c in b) if (a.style[c] !== undefined) return b[c]
				}();
			return a && {
				end: a
			}
		}()
	})
}(window.jQuery), !
function(a) {
	function d() {
		a(".dropdown-backdrop").remove(), a(b).each(function() {
			e(a(this)).removeClass("open")
		})
	}
	function e(b) {
		var c = b.attr("data-target"),
			d;
		c || (c = b.attr("href"), c = c && /#/.test(c) && c.replace(/.*(?=#[^\s]*$)/, "")), d = c && a(c);
		if (!d || !d.length) d = b.parent();
		return d
	}
	var b = "[data-toggle=dropdown]",
		c = function(b) {
			var c = a(b).on("click.dropdown.data-api", this.toggle);
			a("html").on("click.dropdown.data-api", function() {
				c.parent().removeClass("open")
			})
		};
	c.prototype = {
		constructor: c,
		toggle: function(b) {
			var c = a(this),
				f, g;
			if (c.is(".disabled, :disabled")) return;
			return f = e(c), g = f.hasClass("open"), d(), g || ("ontouchstart" in document.documentElement && a('<div class="dropdown-backdrop"/>').insertBefore(a(this)).on("click", d), f.toggleClass("open")), c.focus(), !1
		},
		keydown: function(c) {
			var d, f, g, h, i, j;
			if (!/(38|40|27)/.test(c.keyCode)) return;
			d = a(this), c.preventDefault(), c.stopPropagation();
			if (d.is(".disabled, :disabled")) return;
			h = e(d), i = h.hasClass("open");
			if (!i || i && c.keyCode == 27) return c.which == 27 && h.find(b).focus(), d.click();
			f = a("[role=menu] li:not(.divider):visible a", h);
			if (!f.length) return;
			j = f.index(f.filter(":focus")), c.keyCode == 38 && j > 0 && j--, c.keyCode == 40 && j < f.length - 1 && j++, ~j || (j = 0), f.eq(j).focus()
		}
	};
	var f = a.fn.dropdown;
	a.fn.dropdown = function(b) {
		return this.each(function() {
			var d = a(this),
				e = d.data("dropdown");
			e || d.data("dropdown", e = new c(this)), typeof b == "string" && e[b].call(d)
		})
	}, a.fn.dropdown.Constructor = c, a.fn.dropdown.noConflict = function() {
		return a.fn.dropdown = f, this
	}, a(document).on("click.dropdown.data-api", d).on("click.dropdown.data-api", ".dropdown form", function(a) {
		a.stopPropagation()
	}).on("click.dropdown.data-api", b, c.prototype.toggle).on("keydown.dropdown.data-api", b + ", [role=menu]", c.prototype.keydown)
}(window.jQuery)