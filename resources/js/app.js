import "trix/dist/trix.css";
import "@fancyapps/ui/dist/fancybox/fancybox.css";

import "flyonui/flyonui";

import { Editor } from "@tiptap/core";
import { Placeholder } from "@tiptap/extensions";
import { Color, TextStyle } from "@tiptap/extension-text-style";

import Bold from "@tiptap/extension-bold";
import StarterKit from "@tiptap/starter-kit";
import Highlight from "@tiptap/extension-highlight";
import TextAlign from "@tiptap/extension-text-align";

import { Fancybox } from "@fancyapps/ui/dist/fancybox";

function counter(id, start, end, duration, suffix = "") {
  let obj = document.getElementById(id),
    current = start,
    range = end - start,
    increment = end > start ? 1 : -1,
    step = Math.abs(Math.floor(duration / range)),
    timer = setInterval(() => {
      current += increment;
      let formattedNumber = current;

      // Check if the number is 1000 or more to add "k+" (for thousands)
      if (current >= 1000) {
        formattedNumber = (current / 1000).toFixed(1) + "k"; // Adding the "k" suffix
      }

      obj.textContent = formattedNumber + suffix;
      if (current === end) {
        clearInterval(timer);
      }
    }, step);
}

window.setupEditor = (content) => {
  const CustomBold = Bold.extend({
    renderHTML({ mark, HTMLAttributes }) {
      const { style, ...rest } = HTMLAttributes;

      const newStyle = `font-weight: bold; ${style ? ` ${style}` : ""}`;

      return ["span", { ...rest, style: newStyle.trim() }, 0];
    },
    addOptions() {
      return {
        ...this.parent?.(),
        HTMLAttributes: {},
      };
    },
  });

  const FontSizeTextStyle = TextStyle.extend({
    addAttributes() {
      return {
        fontSize: {
          default: null,
          parseHTML: (element) => element.style.fontSize,
          renderHTML: (attributes) => {
            if (!attributes.fontSize) {
              return {};
            }

            return { style: `font-size: ${attributes.fontSize}` };
          },
        },
      };
    },
  });

  return {
    content: content,
    init(element) {
      const editor = new Editor({
        element: element,
        extensions: [
          StarterKit.configure({
            bold: false,
            link: {
              defaultProtocol: "https",
            },
          }),
          CustomBold,
          Highlight,
          Color,
          FontSizeTextStyle,
          Placeholder.configure({
            placeholder: "kegiatan ini...",
          }),
          TextAlign.configure({
            types: ["paragraph"],
            alignments: ["left", "center", "right"],
          }),
        ],
        content: this.content,
        onUpdate: ({ editor }) => {
          this.content = editor.getHTML();
        },
        editorProps: {
          attributes: {
            class: "focus:outline-none",
          },
        },
      });

      // buat fungsi toolbar
      this.toggleBold = () => editor.chain().focus().toggleBold().run();
      this.toggleItalic = () => editor.chain().focus().toggleItalic().run();
      this.toggleUnderline = () => editor.chain().focus().toggleUnderline().run();
      this.toggleStrike = () => editor.chain().focus().toggleStrike().run();
      this.toggleHighlight = () => editor.chain().focus().toggleHighlight().run();
      this.setLink = () => {
        const href = prompt("Masukkan Link");
        editor.chain().focus().toggleLink({ href }).run();
      };
      this.unsetLink = () => editor.chain().focus().unsetLink().run();
      this.setColor = (color) => editor.chain().focus().setColor(color).run();
      this.resetColor = () => editor.chain().focus().unsetColor().run();
      this.toggleAlign = (align) => editor.chain().focus().toggleTextAlign(align).run();
      this.toggleBulletList = () => editor.chain().focus().toggleBulletList().run();
      this.toggleOrderedList = () => editor.chain().focus().toggleOrderedList().run();
      this.toggleBlockquote = () => editor.chain().focus().toggleBlockquote().run();
      this.toggleHorizontalRule = () => editor.chain().focus().setHorizontalRule().run();

      this.$watch("content", (content) => {
        // If the new content matches Tiptap's then we just skip.
        if (content === editor.getHTML()) return;
        editor.commands.setContent(content, false);
      });
    },
  };
};

document.addEventListener("DOMContentLoaded", () => {
  const count1 = document.getElementById("count1");
  const count2 = document.getElementById("count2");
  const count3 = document.getElementById("count3");
  const count4 = document.getElementById("count4");

  if (count1) {
    counter("count1", 500, 40, 5000, "+");
  }

  if (count2) {
    counter("count2", 100, 950, 5000, "+");
  }

  if (count3) {
    counter("count3", 0, 500, 5000, "+");
  }

  if (count4) {
    counter("count4", 100, 10, 5000, "+");
  }
});

const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll(".nav-link");

window.addEventListener("scroll", () => {
  let current = "";

  sections.forEach((section) => {
    const sectionTop = section.offsetTop - 80; // Adjust for fixed navbar height
    if (scrollY >= sectionTop) {
      current = section.getAttribute("id");
    }
  });

  navLinks.forEach((link) => {
    link.classList.remove("text-primary");
    if (link.getAttribute("href") === "#" + current) {
      link.classList.add("text-primary");
    }
  });
});

// Scroll to top button
document.addEventListener("DOMContentLoaded", () => {
  const scrollToTopBtn = document.getElementById("scrollToTopBtn");
  // Only proceed if button exists
  if (scrollToTopBtn) {
    scrollToTopBtn.classList.add("hidden");

    scrollToTopBtn.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });

    window.onscroll = function () {
      if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollToTopBtn.classList.remove("hidden");
      } else {
        scrollToTopBtn.classList.add("hidden");
      }
    };
  }
});

Fancybox.bind("[data-fancybox]", {});
