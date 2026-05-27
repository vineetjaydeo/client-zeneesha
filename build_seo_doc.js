const {
  Document, Packer, Paragraph, TextRun, Table, TableRow, TableCell,
  Header, Footer, AlignmentType, HeadingLevel, BorderStyle, WidthType,
  ShadingType, VerticalAlign, PageNumber, PageBreak, LevelFormat,
  ExternalHyperlink, TableOfContents
} = require('docx');
const fs = require('fs');

// ─── Colours ───────────────────────────────────────────────
const TEAL   = "0A7B6B";  // Zeneesha-ish dark teal
const TEAL_L = "E6F4F1";  // light teal fill
const SLATE  = "1A2B3C";  // dark navy for headings
const GREY   = "4A5568";
const LGREY  = "F5F7FA";
const MID    = "CBD5E0";
const WHITE  = "FFFFFF";
const AMBER  = "F6AD55";
const AMBER_L= "FFF8EE";
const RED_L  = "FFF0F0";
const GREEN_L= "F0FFF4";

// ─── Helpers ───────────────────────────────────────────────
const sp = (before, after) => ({ spacing: { before: before * 20, after: after * 20 } });
const bold = (text, size = 22, color = SLATE) =>
  new TextRun({ text, bold: true, size, color, font: "Arial" });
const reg = (text, size = 20, color = "333333") =>
  new TextRun({ text, size, color, font: "Arial" });
const ital = (text, size = 20, color = GREY) =>
  new TextRun({ text, italics: true, size, color, font: "Arial" });

const h1 = (text) => new Paragraph({
  heading: HeadingLevel.HEADING_1,
  children: [new TextRun({ text, bold: true, size: 36, color: WHITE, font: "Arial" })],
  shading: { fill: TEAL, type: ShadingType.CLEAR },
  spacing: { before: 360, after: 200 },
  indent: { left: 200, right: 200 },
});

const h2 = (text) => new Paragraph({
  heading: HeadingLevel.HEADING_2,
  children: [new TextRun({ text, bold: true, size: 28, color: TEAL, font: "Arial" })],
  border: { bottom: { style: BorderStyle.SINGLE, size: 4, color: TEAL, space: 4 } },
  spacing: { before: 320, after: 160 },
});

const h3 = (text) => new Paragraph({
  heading: HeadingLevel.HEADING_3,
  children: [new TextRun({ text, bold: true, size: 24, color: SLATE, font: "Arial" })],
  spacing: { before: 240, after: 100 },
});

const h4 = (text) => new Paragraph({
  children: [new TextRun({ text, bold: true, size: 22, color: GREY, font: "Arial" })],
  spacing: { before: 180, after: 80 },
});

const para = (text, size = 20, color = "2D3748") => new Paragraph({
  children: [new TextRun({ text, size, color, font: "Arial" })],
  spacing: { before: 80, after: 80 },
});

const gap = (pts = 120) => new Paragraph({
  children: [new TextRun("")],
  spacing: { before: 0, after: pts },
});

// Bullet using numbering
const bullet = (text, size = 20, color = "2D3748") => new Paragraph({
  numbering: { reference: "bullets", level: 0 },
  children: [new TextRun({ text, size, color, font: "Arial" })],
  spacing: { before: 60, after: 60 },
});

const bulletBold = (label, rest, size = 20) => new Paragraph({
  numbering: { reference: "bullets", level: 0 },
  children: [
    new TextRun({ text: label, bold: true, size, color: SLATE, font: "Arial" }),
    new TextRun({ text: rest, size, color: "2D3748", font: "Arial" }),
  ],
  spacing: { before: 60, after: 60 },
});

// ─── Info box (shaded paragraph block) ────────────────────
const infoBox = (label, text, fill = TEAL_L, labelColor = TEAL) => [
  new Paragraph({
    children: [
      new TextRun({ text: label + "  ", bold: true, size: 18, color: labelColor, font: "Arial" }),
      new TextRun({ text, size: 18, color: "2D3748", font: "Arial" }),
    ],
    shading: { fill, type: ShadingType.CLEAR },
    spacing: { before: 80, after: 80 },
    indent: { left: 200, right: 200 },
    border: {
      left: { style: BorderStyle.SINGLE, size: 12, color: labelColor, space: 8 },
    },
  }),
];

// ─── 2-col table helper ───────────────────────────────────
const twoCol = (leftContent, rightContent, leftWidth = 4200, rightWidth = 5160) => {
  const border = { style: BorderStyle.SINGLE, size: 1, color: MID };
  const borders = { top: border, bottom: border, left: border, right: border };
  return new Table({
    width: { size: 9360, type: WidthType.DXA },
    columnWidths: [leftWidth, rightWidth],
    rows: [
      new TableRow({
        children: [
          new TableCell({
            borders, width: { size: leftWidth, type: WidthType.DXA },
            margins: { top: 120, bottom: 120, left: 160, right: 160 },
            children: leftContent,
          }),
          new TableCell({
            borders, width: { size: rightWidth, type: WidthType.DXA },
            margins: { top: 120, bottom: 120, left: 160, right: 160 },
            children: rightContent,
          }),
        ],
      }),
    ],
  });
};

// ─── Keyword tag table ────────────────────────────────────
const kwRow = (intent, keywords, volume, priority) => {
  const border = { style: BorderStyle.SINGLE, size: 1, color: MID };
  const borders = { top: border, bottom: border, left: border, right: border };
  const cell = (text, fill, w, boldIt = false) => new TableCell({
    borders,
    width: { size: w, type: WidthType.DXA },
    shading: fill ? { fill, type: ShadingType.CLEAR } : undefined,
    margins: { top: 80, bottom: 80, left: 120, right: 120 },
    children: [new Paragraph({
      children: [new TextRun({ text, bold: boldIt, size: 18, color: boldIt ? SLATE : "2D3748", font: "Arial" })],
      spacing: { before: 0, after: 0 },
    })],
  });
  return new TableRow({
    children: [
      cell(intent, null, 2200, true),
      cell(keywords, null, 4360),
      cell(volume, null, 1200),
      cell(priority, priority === "P1" ? TEAL_L : priority === "P2" ? AMBER_L : LGREY, 1600, priority === "P1"),
    ],
  });
};

const kwHeaderRow = () => {
  const border = { style: BorderStyle.SINGLE, size: 1, color: MID };
  const borders = { top: border, bottom: border, left: border, right: border };
  const cell = (text, w) => new TableCell({
    borders,
    width: { size: w, type: WidthType.DXA },
    shading: { fill: SLATE, type: ShadingType.CLEAR },
    margins: { top: 80, bottom: 80, left: 120, right: 120 },
    children: [new Paragraph({
      children: [new TextRun({ text, bold: true, size: 18, color: WHITE, font: "Arial" })],
      spacing: { before: 0, after: 0 },
    })],
  });
  return new TableRow({
    children: [
      cell("Search Intent", 2200),
      cell("Target Keywords / Phrases", 4360),
      cell("Volume", 1200),
      cell("Priority", 1600),
    ],
  });
};

// ─── Section mapping table row ───────────────────────────
const secRow = (section, approvedCopy, seoRationale, keywordsHit) => {
  const border = { style: BorderStyle.SINGLE, size: 1, color: MID };
  const borders = { top: border, bottom: border, left: border, right: border };
  const cell = (children, w, fill) => new TableCell({
    borders,
    width: { size: w, type: WidthType.DXA },
    shading: fill ? { fill, type: ShadingType.CLEAR } : undefined,
    margins: { top: 100, bottom: 100, left: 140, right: 140 },
    verticalAlign: VerticalAlign.TOP,
    children,
  });
  return new TableRow({
    children: [
      cell([new Paragraph({ children: [bold(section, 18)], spacing: { before: 0, after: 0 } })], 1600, LGREY),
      cell([new Paragraph({ children: [new TextRun({ text: approvedCopy, size: 17, color: "2D3748", italics: true, font: "Arial" })], spacing: { before: 0, after: 0 } })], 2800),
      cell([new Paragraph({ children: [new TextRun({ text: seoRationale, size: 17, color: "2D3748", font: "Arial" })], spacing: { before: 0, after: 0 } })], 2960),
      cell([new Paragraph({ children: [new TextRun({ text: keywordsHit, size: 17, color: TEAL, font: "Arial" })], spacing: { before: 0, after: 0 } })], 2000),
    ],
  });
};

// ─── Checklist row ────────────────────────────────────────
const checkRow = (item, status, note, statusColor = TEAL) => {
  const border = { style: BorderStyle.SINGLE, size: 1, color: MID };
  const borders = { top: border, bottom: border, left: border, right: border };
  const cell = (children, w, fill) => new TableCell({
    borders, width: { size: w, type: WidthType.DXA },
    shading: fill ? { fill, type: ShadingType.CLEAR } : undefined,
    margins: { top: 80, bottom: 80, left: 120, right: 120 },
    verticalAlign: VerticalAlign.TOP,
    children,
  });
  return new TableRow({
    children: [
      cell([new Paragraph({ children: [new TextRun({ text: item, size: 18, color: SLATE, font: "Arial" })], spacing: { before: 0, after: 0 } })], 4200),
      cell([new Paragraph({ children: [new TextRun({ text: status, bold: true, size: 18, color: statusColor, font: "Arial" })], spacing: { before: 0, after: 0 } })], 1600, statusColor === TEAL ? GREEN_L : statusColor === "CC4400" ? RED_L : AMBER_L),
      cell([new Paragraph({ children: [new TextRun({ text: note, size: 17, color: GREY, font: "Arial" })], spacing: { before: 0, after: 0 } })], 3560),
    ],
  });
};

const tableHeaderRow3 = (col1, col2, col3, widths) => {
  const border = { style: BorderStyle.SINGLE, size: 1, color: MID };
  const borders = { top: border, bottom: border, left: border, right: border };
  const cell = (text, w) => new TableCell({
    borders, width: { size: w, type: WidthType.DXA },
    shading: { fill: SLATE, type: ShadingType.CLEAR },
    margins: { top: 80, bottom: 80, left: 120, right: 120 },
    children: [new Paragraph({ children: [new TextRun({ text, bold: true, size: 18, color: WHITE, font: "Arial" })], spacing: { before: 0, after: 0 } })],
  });
  return new TableRow({
    children: [cell(col1, widths[0]), cell(col2, widths[1]), cell(col3, widths[2])],
  });
};

// ─── Page break ──────────────────────────────────────────
const pb = () => new Paragraph({ children: [new PageBreak()] });

// ─── DOCUMENT ────────────────────────────────────────────
const doc = new Document({
  numbering: {
    config: [
      {
        reference: "bullets",
        levels: [{
          level: 0, format: LevelFormat.BULLET, text: "•",
          alignment: AlignmentType.LEFT,
          style: { paragraph: { indent: { left: 560, hanging: 280 } } },
        }],
      },
      {
        reference: "numbers",
        levels: [{
          level: 0, format: LevelFormat.DECIMAL, text: "%1.",
          alignment: AlignmentType.LEFT,
          style: { paragraph: { indent: { left: 560, hanging: 280 } } },
        }],
      },
    ],
  },
  styles: {
    default: {
      document: { run: { font: "Arial", size: 20 } },
    },
    paragraphStyles: [
      {
        id: "Heading1", name: "Heading 1", basedOn: "Normal", next: "Normal", quickFormat: true,
        run: { size: 36, bold: true, font: "Arial", color: WHITE },
        paragraph: { spacing: { before: 360, after: 200 }, outlineLevel: 0 },
      },
      {
        id: "Heading2", name: "Heading 2", basedOn: "Normal", next: "Normal", quickFormat: true,
        run: { size: 28, bold: true, font: "Arial", color: TEAL },
        paragraph: { spacing: { before: 320, after: 160 }, outlineLevel: 1 },
      },
      {
        id: "Heading3", name: "Heading 3", basedOn: "Normal", next: "Normal", quickFormat: true,
        run: { size: 24, bold: true, font: "Arial", color: SLATE },
        paragraph: { spacing: { before: 240, after: 100 }, outlineLevel: 2 },
      },
    ],
  },
  sections: [
    {
      properties: {
        page: {
          size: { width: 11906, height: 16838 }, // A4
          margin: { top: 1080, right: 1080, bottom: 1080, left: 1080 },
        },
      },
      headers: {
        default: new Header({
          children: [
            new Paragraph({
              children: [
                new TextRun({ text: "Zeneesha.com — SEO Content Guidelines", size: 16, color: GREY, font: "Arial" }),
                new TextRun({ text: "\t", font: "Arial" }),
                new TextRun({ text: "Prepared by iKawn  |  Confidential", size: 16, color: GREY, font: "Arial" }),
              ],
              tabStops: [{ type: "right", position: 8640 }],
              border: { bottom: { style: BorderStyle.SINGLE, size: 4, color: MID, space: 4 } },
              spacing: { before: 0, after: 120 },
            }),
          ],
        }),
      },
      footers: {
        default: new Footer({
          children: [
            new Paragraph({
              children: [
                new TextRun({ text: "Page ", size: 16, color: GREY, font: "Arial" }),
                new TextRun({ children: [PageNumber.CURRENT], size: 16, color: GREY, font: "Arial" }),
                new TextRun({ text: " of ", size: 16, color: GREY, font: "Arial" }),
                new TextRun({ children: [PageNumber.TOTAL_PAGES], size: 16, color: GREY, font: "Arial" }),
              ],
              alignment: AlignmentType.RIGHT,
              border: { top: { style: BorderStyle.SINGLE, size: 4, color: MID, space: 4 } },
              spacing: { before: 120, after: 0 },
            }),
          ],
        }),
      },
      children: [

        // ═══════════════════════════════════════════════════
        // COVER
        // ═══════════════════════════════════════════════════
        new Paragraph({
          children: [new TextRun({ text: "", size: 20 })],
          spacing: { before: 0, after: 600 },
        }),
        new Paragraph({
          children: [new TextRun({ text: "ZENEESHA.COM", bold: true, size: 48, color: TEAL, font: "Arial" })],
          alignment: AlignmentType.CENTER,
          spacing: { before: 0, after: 160 },
        }),
        new Paragraph({
          children: [new TextRun({ text: "SEO Content Guidelines", bold: true, size: 52, color: SLATE, font: "Arial" })],
          alignment: AlignmentType.CENTER,
          spacing: { before: 0, after: 120 },
        }),
        new Paragraph({
          children: [new TextRun({ text: "Website Revamp · Homepage & Beyond", size: 24, color: GREY, font: "Arial" })],
          alignment: AlignmentType.CENTER,
          spacing: { before: 0, after: 600 },
        }),
        new Paragraph({
          border: { bottom: { style: BorderStyle.SINGLE, size: 6, color: TEAL, space: 1 } },
          children: [],
          spacing: { before: 0, after: 600 },
        }),
        new Paragraph({
          children: [new TextRun({ text: "Prepared by iKawn", size: 20, color: GREY, font: "Arial" })],
          alignment: AlignmentType.CENTER,
          spacing: { before: 0, after: 100 },
        }),
        new Paragraph({
          children: [new TextRun({ text: "April 2026  ·  Version 1.0  ·  Confidential", size: 20, color: GREY, font: "Arial" })],
          alignment: AlignmentType.CENTER,
          spacing: { before: 0, after: 800 },
        }),

        // Purpose callout box
        new Paragraph({
          children: [
            new TextRun({ text: "Purpose: ", bold: true, size: 20, color: TEAL, font: "Arial" }),
            new TextRun({ text: "This document defines the SEO strategy, keyword framework, on-page standards, and content guidelines for the zeneesha.com website revamp. It is intended to align the content team's output — including the approved homepage — with a clear, evidence-based SEO plan.", size: 20, color: "2D3748", font: "Arial" }),
          ],
          shading: { fill: TEAL_L, type: ShadingType.CLEAR },
          border: { left: { style: BorderStyle.SINGLE, size: 16, color: TEAL, space: 10 } },
          indent: { left: 200, right: 200 },
          spacing: { before: 120, after: 120 },
        }),

        pb(),

        // ═══════════════════════════════════════════════════
        // SECTION 1: STRATEGIC CONTEXT
        // ═══════════════════════════════════════════════════
        h1("1.  Strategic Context & Starting Point"),
        gap(80),

        h2("Why SEO Is the Priority"),
        para("The existing zeneesha.com is heavily dependent on direct traffic — visitors who already know the brand. That is not a discovery engine; it is a referral-dependent model. For a Workday consulting firm competing in a specialist market, organic search should be generating 40–60% of inbound traffic. Right now it generates approximately 16%."),
        gap(60),
        para("The revamped website has one primary job before any paid investment: become visible to the people who are actively searching for Workday support, optimisation, and expertise — and convert that visibility into qualified conversations."),

        gap(80),
        h2("Baseline Metrics (Audit Reference: March 2026)"),
        gap(60),

        (() => {
          const border = { style: BorderStyle.SINGLE, size: 1, color: MID };
          const borders = { top: border, bottom: border, left: border, right: border };
          const row = (metric, current, target, note) => new TableRow({
            children: [
              new TableCell({ borders, width: { size: 3000, type: WidthType.DXA }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [bold(metric, 18)], spacing: { before: 0, after: 0 } })] }),
              new TableCell({ borders, width: { size: 1500, type: WidthType.DXA }, shading: { fill: RED_L, type: ShadingType.CLEAR }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: current, bold: true, size: 18, color: "CC3300", font: "Arial" })], spacing: { before: 0, after: 0 } })] }),
              new TableCell({ borders, width: { size: 1500, type: WidthType.DXA }, shading: { fill: GREEN_L, type: ShadingType.CLEAR }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: target, bold: true, size: 18, color: "1A7A4A", font: "Arial" })], spacing: { before: 0, after: 0 } })] }),
              new TableCell({ borders, width: { size: 3360, type: WidthType.DXA }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: note, size: 17, color: GREY, font: "Arial" })], spacing: { before: 0, after: 0 } })] }),
            ],
          });
          const hrow = () => new TableRow({
            children: ["Metric", "Current", "Target", "Context"].map((t, i) =>
              new TableCell({
                borders,
                width: { size: [3000, 1500, 1500, 3360][i], type: WidthType.DXA },
                shading: { fill: SLATE, type: ShadingType.CLEAR },
                margins: { top: 80, bottom: 80, left: 120, right: 120 },
                children: [new Paragraph({ children: [new TextRun({ text: t, bold: true, size: 18, color: WHITE, font: "Arial" })], spacing: { before: 0, after: 0 } })],
              })
            ),
          });
          return new Table({
            width: { size: 9360, type: WidthType.DXA },
            columnWidths: [3000, 1500, 1500, 3360],
            rows: [
              hrow(),
              row("Organic Search Traffic", "16%", "40–60%", "Critical gap. Main SEO objective."),
              row("Direct Traffic", "76%", "<40%", "Too dependent on brand awareness."),
              row("Homepage Bounce Rate", "~54%", "<35%", "Content must match search intent better."),
              row("Google CRuX Data", "No Data", "Generate CWV data", "Need traffic volume to benchmark."),
              row("Blog Driving Organic", "Negligible", "Top 20 posts ranking P1–3", "168 posts, almost none indexed well."),
              row("Conversion Events", "78 / 28 days", "250+ / 28 days", "Funnel needs a lead capture layer."),
            ],
          });
        })(),

        gap(100),
        ...infoBox("Key Opportunity:", "The existing blog library of 168 posts covers exactly the right topics — Workday implementation, HCM, AMS, data migration — but almost none are optimised to rank. The revamp gives us a chance to fix both new and existing content simultaneously, compounding SEO gains.", AMBER_L, "B45309"),

        pb(),

        // ═══════════════════════════════════════════════════
        // SECTION 2: KEYWORD STRATEGY
        // ═══════════════════════════════════════════════════
        h1("2.  Keyword Strategy"),
        gap(80),

        para("Keywords are organised into three tiers: primary (high-value, competitive, homepage-level), secondary (service and module-level, inner pages), and long-tail / intent-based (low competition, high conversion — ideal for blog and FAQ content). All targeting uses British English spelling conventions aligned to the primary market."),
        gap(100),

        h2("Tier 1 — Primary Keywords (Homepage & Core Pages)"),
        para("These are the terms Zeneesha must rank for to compete. They have meaningful monthly search volume in the UK and represent the highest buyer intent. Every piece of homepage copy should support — not force — these terms."),
        gap(60),

        new Table({
          width: { size: 9360, type: WidthType.DXA },
          columnWidths: [2200, 4360, 1200, 1600],
          rows: [
            kwHeaderRow(),
            kwRow("Core service", "workday consulting partner / workday consulting firm", "500–1K", "P1"),
            kwRow("Support / managed", "workday ams support / workday managed services", "200–500", "P1"),
            kwRow("Implementation", "workday implementation partner / workday go-live support", "200–500", "P1"),
            kwRow("Optimisation", "workday optimisation / workday performance optimisation", "100–200", "P1"),
            kwRow("Health check (branded)", "workday health check / workday health checkup", "50–100", "P1"),
            kwRow("Module: HCM", "workday hcm consulting / workday hcm support", "200–500", "P2"),
            kwRow("Module: Finance", "workday finance consulting / workday adaptive planning", "100–200", "P2"),
          ],
        }),

        gap(100),
        h2("Tier 2 — Secondary Keywords (Service & Inner Pages)"),
        para("These terms support individual service pages and should appear in H2 headings, service descriptions, and blog posts. They feed topical authority back to the homepage."),
        gap(60),

        new Table({
          width: { size: 9360, type: WidthType.DXA },
          columnWidths: [2200, 4360, 1200, 1600],
          rows: [
            kwHeaderRow(),
            kwRow("Reporting", "workday reporting solutions / workday analytics consulting", "50–200", "P2"),
            kwRow("Integrations", "workday integration services / workday api integrations", "50–100", "P2"),
            kwRow("Adoption", "workday adoption support / workday user adoption strategy", "50–100", "P2"),
            kwRow("Automation", "workday automation / workday business process automation", "100–200", "P2"),
            kwRow("Rollouts", "workday rollout support / workday global rollout", "50–100", "P2"),
            kwRow("Releases", "workday releases management / workday release updates", "50–100", "P3"),
            kwRow("Post go-live", "workday post go-live support / after workday go-live", "50–100", "P2"),
          ],
        }),

        gap(100),
        h2("Tier 3 — Long-Tail & Intent-Based Keywords (Blog & FAQs)"),
        para("These are the question-based and problem-based searches that people type when they are experiencing Workday pain. They have lower volume but much higher conversion intent. FAQ content and blog posts targeting these phrases bring the right visitors at the right moment."),
        gap(60),

        new Table({
          width: { size: 9360, type: WidthType.DXA },
          columnWidths: [2800, 5160, 1400],
          rows: [
            (() => {
              const border = { style: BorderStyle.SINGLE, size: 1, color: MID };
              const borders = { top: border, bottom: border, left: border, right: border };
              const cell = (t, w) => new TableCell({ borders, width: { size: w, type: WidthType.DXA }, shading: { fill: SLATE, type: ShadingType.CLEAR }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: t, bold: true, size: 18, color: WHITE, font: "Arial" })], spacing: { before: 0, after: 0 } })] });
              return new TableRow({ children: [cell("Pain Point / Question", 2800), cell("Example Search Queries", 5160), cell("Content Home", 1400)] });
            })(),
            ...[
              ["Recurring Workday issues", "why does workday keep having the same issues / workday recurring support tickets / workday problems not getting fixed", "FAQ + Blog"],
              ["Manual workarounds", "workday manual workarounds / why are teams bypassing workday / workday process workarounds", "Blog"],
              ["Reporting gaps", "workday reports not working / workday reporting delays / why is workday reporting slow", "FAQ + Blog"],
              ["Adoption problems", "workday low adoption / employees not using workday / workday training issues", "Blog"],
              ["Release management", "workday release features we should use / how to prioritise workday updates", "Blog"],
              ["Underused features", "workday features we are not using / maximise workday value / workday roi improvement", "FAQ + Blog"],
              ["AMS vs internal team", "do we need workday ams / workday internal vs external support / workday ams benefits", "Blog"],
              ["Health check need", "how to know if workday needs a review / workday system health check / workday environment review", "FAQ"],
            ].map(([pain, queries, home]) => {
              const border = { style: BorderStyle.SINGLE, size: 1, color: MID };
              const borders = { top: border, bottom: border, left: border, right: border };
              return new TableRow({
                children: [
                  new TableCell({ borders, width: { size: 2800, type: WidthType.DXA }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [bold(pain, 17)], spacing: { before: 0, after: 0 } })] }),
                  new TableCell({ borders, width: { size: 5160, type: WidthType.DXA }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: queries, size: 17, color: GREY, italics: true, font: "Arial" })], spacing: { before: 0, after: 0 } })] }),
                  new TableCell({ borders, width: { size: 1400, type: WidthType.DXA }, shading: { fill: TEAL_L, type: ShadingType.CLEAR }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: home, size: 17, color: TEAL, bold: true, font: "Arial" })], spacing: { before: 0, after: 0 } })] }),
                ],
              });
            }),
          ],
        }),

        gap(100),
        h2("Keyword Usage Rules"),
        bulletBold("Do not force keywords. ", "Every keyword should read naturally. If adding a keyword makes a sentence sound awkward, it does not belong there."),
        bulletBold("Primary keyword in the H1 or page title. ", "Each page should have one clear primary keyword target — never two competing for the same page."),
        bulletBold("Use synonyms and related terms. ", "Google understands semantic context. Use 'Workday support', 'Workday optimisation', and 'Workday AMS' on the same page — they reinforce each other."),
        bulletBold("British English only. ", "Use 'optimisation', 'organisation', 'recognise'. These are the spellings your target market searches."),
        bulletBold("Avoid keyword cannibalism. ", "Do not use the same primary keyword on multiple pages. Map each keyword to one owner page."),

        pb(),

        // ═══════════════════════════════════════════════════
        // SECTION 3: ON-PAGE SEO STANDARDS
        // ═══════════════════════════════════════════════════
        h1("3.  On-Page SEO Standards"),
        gap(80),

        para("These standards apply to every page on zeneesha.com — new and existing. The content team is responsible for providing the copy elements below. The development/SEO team will implement them in WordPress / Yoast SEO."),
        gap(100),

        h2("Page Title Tag"),
        bulletBold("Format: ", "[Primary Keyword] | Zeneesha"),
        bulletBold("Length: ", "50–60 characters. Google truncates beyond 60."),
        bulletBold("Rule: ", "One primary keyword per page. Do not repeat the brand name in the middle of the title."),
        bulletBold("Homepage example: ", "Workday Consulting Partner | Zeneesha"),
        bulletBold("Service page example: ", "Workday AMS & Ongoing Support | Zeneesha"),
        bulletBold("Blog post example: ", "How to Know If Your Workday System Needs a Health Check | Zeneesha"),
        gap(60),
        ...infoBox("Audit Finding:", "The current homepage meta title contained a typo ('Zenesha' instead of 'Zeneesha') — visible in every Google search result. This must be corrected on launch and treated as a zero-tolerance issue going forward.", RED_L, "CC3300"),

        gap(100),
        h2("Meta Description"),
        bulletBold("Length: ", "140–155 characters. Aim for 150."),
        bulletBold("Must include: ", "The primary keyword, a clear value statement, and a soft call-to-action (e.g. 'Find out more', 'Request a review')."),
        bulletBold("Tone: ", "Written for the human reader, not the algorithm. It is the first impression in search results."),
        bulletBold("Homepage: ", "Zeneesha is your dedicated Workday consulting partner — reducing friction, improving performance, and maximising ROI across HCM, Finance, and Adaptive Planning. Request a health check today."),
        bulletBold("No duplicates. ", "Every page must have a unique meta description. Pages missing meta descriptions receive auto-generated snippets from Google, which are rarely effective."),

        gap(100),
        h2("H1 — Page Heading"),
        bulletBold("One H1 per page. ", "This is the single most important on-page SEO signal. The current site has a Workday® H1 in the footer CTA that creates duplicate H1s on every page. This must be resolved in the new build."),
        bulletBold("Must contain the primary keyword. ", "Naturally, not forced. The H1 is what Google uses to understand what the page is about."),
        bulletBold("Homepage H1: ", "The hero headline serves as the effective H1. It must contain 'Workday' and signal the core value proposition."),
        bulletBold("Character guidance: ", "50–70 characters ideal. Shorter is acceptable if it is clear and keyword-relevant."),

        gap(100),
        h2("H2 and H3 Subheadings"),
        bulletBold("H2s should target secondary keywords. ", "Think of each H2 as a mini-landing-page for a related search query."),
        bulletBold("H3s support the H2 with specifics. ", "Use for sub-topics, process steps, and feature details."),
        bulletBold("Do not skip levels. ", "Never jump from H1 to H3 without an H2. This confuses crawlers and screen readers."),
        bulletBold("Avoid 'clever' headings that sacrifice clarity. ", "A heading that reads like a campaign tagline but contains no keyword is a missed opportunity."),

        gap(100),
        h2("URL Structure"),
        para("URLs should be short, lowercase, hyphenated, and keyword-relevant."),
        gap(60),
        (() => {
          const border = { style: BorderStyle.SINGLE, size: 1, color: MID };
          const borders = { top: border, bottom: border, left: border, right: border };
          const row = (pg, good, bad) => new TableRow({
            children: [
              new TableCell({ borders, width: { size: 2400, type: WidthType.DXA }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [bold(pg, 17)], spacing: { before: 0, after: 0 } })] }),
              new TableCell({ borders, width: { size: 3480, type: WidthType.DXA }, shading: { fill: GREEN_L, type: ShadingType.CLEAR }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: good, size: 17, color: "1A7A4A", font: "Courier New" })], spacing: { before: 0, after: 0 } })] }),
              new TableCell({ borders, width: { size: 3480, type: WidthType.DXA }, shading: { fill: RED_L, type: ShadingType.CLEAR }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: bad, size: 17, color: "CC3300", font: "Courier New" })], spacing: { before: 0, after: 0 } })] }),
            ],
          });
          const hrow = () => new TableRow({
            children: ["Page", "✓ Good URL", "✗ Avoid"].map((t, i) =>
              new TableCell({ borders, width: { size: [2400, 3480, 3480][i], type: WidthType.DXA }, shading: { fill: SLATE, type: ShadingType.CLEAR }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: t, bold: true, size: 18, color: WHITE, font: "Arial" })], spacing: { before: 0, after: 0 } })] })
            ),
          });
          return new Table({
            width: { size: 9360, type: WidthType.DXA },
            columnWidths: [2400, 3480, 3480],
            rows: [
              hrow(),
              row("AMS Service", "/services/workday-ams-support", "/services/zeneesha-elevate"),
              row("HCM & Finance", "/services/workday-hcm-finance-consulting", "/services/workday-hcm-and-finance-…"),
              row("Blog post", "/blog/workday-health-check-guide", "/latest-news/?p=1234"),
              row("Contact", "/contact", "/speak-to-our-workday-experts"),
            ],
          });
        })(),
        gap(80),
        ...infoBox("Note:", "Internal page naming conventions (like 'Zeneesha Elevate', 'ZAS', 'ZCS') should remain as brand terms in copy but should NOT appear in URLs. URLs are a direct Google ranking signal — use keyword-friendly slugs.", AMBER_L, "B45309"),

        gap(100),
        h2("Alt Text for Images"),
        bulletBold("Every image must have alt text. ", "The audit found 60+ images across the site missing alt text entirely. This hurts both accessibility and image search ranking."),
        bulletBold("Format: ", "Describe what the image shows + include a relevant keyword where it fits naturally."),
        bulletBold("Good example: ", "Workday consultant reviewing HCM dashboard with client team"),
        bulletBold("Bad example: ", "image1.png or 'consultants' or left blank"),
        bulletBold("Decorative images: ", "Use empty alt text (alt=\"\") for purely decorative elements — do not force keywords onto images that serve no informational purpose."),

        pb(),

        // ═══════════════════════════════════════════════════
        // SECTION 4: HOMEPAGE SEO BLUEPRINT
        // ═══════════════════════════════════════════════════
        h1("4.  Homepage SEO Blueprint"),
        gap(80),

        para("This section maps each section of the approved homepage (Version 3) to its specific SEO rationale. The content was developed with keyword intent, E-E-A-T (Experience, Expertise, Authoritativeness, Trustworthiness), and search behaviour in mind. The table below documents how each section earns its place both for users and for search engines."),
        gap(80),
        ...infoBox("What is E-E-A-T?", "Google's quality rater guidelines evaluate pages on Experience, Expertise, Authoritativeness, and Trustworthiness (E-E-A-T). B2B service pages — especially in a specialist technical field like Workday consulting — are assessed heavily on these signals. Stats, case studies, testimonials, certifications, and precise technical language all contribute to E-E-A-T scores.", TEAL_L, TEAL),

        gap(100),
        h2("Section-by-Section SEO Rationale"),
        gap(60),

        (() => {
          const border = { style: BorderStyle.SINGLE, size: 1, color: MID };
          const borders = { top: border, bottom: border, left: border, right: border };
          const hrow = () => new TableRow({
            children: ["Section", "Approved Copy (Final)", "SEO Rationale", "Keywords Served"].map((t, i) =>
              new TableCell({
                borders,
                width: { size: [1500, 2700, 3000, 2160][i], type: WidthType.DXA },
                shading: { fill: SLATE, type: ShadingType.CLEAR },
                margins: { top: 80, bottom: 80, left: 120, right: 120 },
                children: [new Paragraph({ children: [new TextRun({ text: t, bold: true, size: 18, color: WHITE, font: "Arial" })], spacing: { before: 0, after: 0 } })],
              })
            ),
          });

          const row = (section, copy, rationale, keywords, fill) => new TableRow({
            children: [
              new TableCell({ borders, width: { size: 1500, type: WidthType.DXA }, shading: { fill: LGREY, type: ShadingType.CLEAR }, margins: { top: 100, bottom: 100, left: 120, right: 120 }, verticalAlign: VerticalAlign.TOP, children: [new Paragraph({ children: [bold(section, 17)], spacing: { before: 0, after: 0 } })] }),
              new TableCell({ borders, width: { size: 2700, type: WidthType.DXA }, margins: { top: 100, bottom: 100, left: 120, right: 120 }, verticalAlign: VerticalAlign.TOP, children: [new Paragraph({ children: [new TextRun({ text: copy, size: 17, color: "444444", italics: true, font: "Arial" })], spacing: { before: 0, after: 0 } })] }),
              new TableCell({ borders, width: { size: 3000, type: WidthType.DXA }, margins: { top: 100, bottom: 100, left: 120, right: 120 }, verticalAlign: VerticalAlign.TOP, children: [new Paragraph({ children: [new TextRun({ text: rationale, size: 17, color: "2D3748", font: "Arial" })], spacing: { before: 0, after: 0 } })] }),
              new TableCell({ borders, width: { size: 2160, type: WidthType.DXA }, shading: { fill: TEAL_L, type: ShadingType.CLEAR }, margins: { top: 100, bottom: 100, left: 120, right: 120 }, verticalAlign: VerticalAlign.TOP, children: [new Paragraph({ children: [new TextRun({ text: keywords, size: 17, color: TEAL, font: "Arial" })], spacing: { before: 0, after: 0 } })] }),
            ],
          });

          return new Table({
            width: { size: 9360, type: WidthType.DXA },
            columnWidths: [1500, 2700, 3000, 2160],
            rows: [
              hrow(),
              row(
                "S1 — Hero Headline",
                "Smarter Workday. Stronger ROI",
                "Short, memorable headline with the brand keyword ('Workday') and the buyer's core desired outcome ('ROI'). Avoids jargon while signalling expertise. Sets the context Google needs to classify the page.",
                "workday, workday ROI, workday optimisation"
              ),
              row(
                "S1 — Subheadline",
                "Eliminate Workday Friction with Expert Guidance, Streamlined Processes, and Ongoing Performance Optimisation.",
                "This sentence is the de facto SEO-rich description of Zeneesha's service. It naturally contains 'Workday Friction' (long-tail), 'Expert Guidance' (E-E-A-T), 'Performance Optimisation' (primary keyword cluster). Written for humans; reads well for crawlers.",
                "workday friction, workday performance optimisation, workday expert guidance"
              ),
              row(
                "S1 — CTA",
                "Request a Workday Health Checkup",
                "Branded conversion term. Repeating this phrase consistently across the homepage and supporting pages creates a recognisable entry point that can itself become a searchable branded term over time.",
                "workday health check / workday health checkup"
              ),
              row(
                "S1 — Trust Line",
                "Seamlessly connect Implementation, AMS, and AI-led innovation across Workday HCM, Finance, and Adaptive Planning with a single trusted partner.",
                "Serves dual purpose: introduces the full service breadth (keyword coverage) and signals authority and comprehensiveness. 'Single trusted partner' addresses a core buyer concern in a crowded market.",
                "workday implementation, workday AMS, workday HCM, workday finance, workday adaptive planning"
              ),
              row(
                "S2 — Stats Block",
                "15+ Years Avg Exp · 100% Certified Team · 50,000+ Employees · 95% Retention · 200,000+ AMS Hours",
                "Critical for E-E-A-T. Google's quality raters look for evidence of genuine experience. Quantified claims — especially '100% Workday Certified Team' and '200,000+ AMS Hours Delivered' — are stronger trust signals than any marketing claim. Reinforces 'workday ams' keyword cluster.",
                "workday AMS, workday certified, workday expertise"
              ),
              row(
                "S3 — Challenges Section",
                "Recurring tickets / Manual workarounds / Reporting delays / Uneven adoption / Release fatigue / Underused capability",
                "Each signal card maps directly to a real search query typed by a Workday user experiencing that problem. This section mirrors search intent at the language level — not keyword stuffing, but genuine intent matching. Increases dwell time as visitors see their exact problem described.",
                "workday recurring issues, workday manual workarounds, workday reporting delays, workday adoption"
              ),
              row(
                "S4 — Solution",
                "Look deeper. Choose better. Move forward. / Understand → Diagnose → Recommend → Improve",
                "Four-step methodology positions Zeneesha as process-driven, not reactive. Google rewards pages that demonstrate structured expertise. The approach steps contain natural secondary keywords: 'diagnose', 'recommend', 'improve' — all aligned to the 'workday optimisation' cluster.",
                "workday optimisation process, workday improvement roadmap, workday expert consulting"
              ),
              row(
                "S5 — Services",
                "Start Your Workday Journey / Grow Your Workday Value / Achieve More with Workday",
                "Three service pillars map precisely to the three buyer journey stages: Implementation (new), AMS (existing), and Maximise (value realisation). Each pillar is a keyword cluster anchor that will link to its own service page — building internal linking authority.",
                "workday implementation, workday AMS support, workday automation, workday analytics"
              ),
              row(
                "S6 — Testimonial",
                "The right Workday partner changes the conversation.",
                "Social proof is an explicit E-E-A-T signal. The section headline positions Zeneesha as a 'Workday partner' (keyword) and the quote template reinforces outcomes, clarity, and confidence — language that mirrors buyer expectations.",
                "workday partner, workday consulting testimonial"
              ),
              row(
                "S7 — Case Study",
                "From recurring Workday issues to a clearer roadmap. Signal → Diagnosis → Decision → Outcome.",
                "Structured case study format (Signal, Diagnosis, Decision, Outcome) matches Google's preference for evidence-based, narrative content. The Signal → Outcome arc directly mirrors the search journey: problem → solution. This section also answers long-tail queries like 'how Zeneesha helped reduce Workday issues'.",
                "workday case study, workday recurring issues resolved, workday support partner results"
              ),
              row(
                "S8 — FAQ",
                "5 questions covering health check, post-go-live support, internal teams, modules, and the checkup process.",
                "FAQs are the highest-value SEO content on a homepage because they: (a) match long-tail and question-based queries exactly, (b) qualify for FAQ schema markup which generates rich results (expanded answers in Google SERPs), and (c) build topical depth without increasing bounce rate. All five questions align to confirmed Tier 3 keyword targets.",
                "workday health check FAQ, workday support questions, workday modules covered"
              ),
              row(
                "S8 — Footer CTA",
                "How optimised is your Workday today? / Get a clearer view of your gaps, options, and next best steps.",
                "The footer CTA rephrases the core question in the user's voice — 'How optimised is your Workday today?' is a natural language query. The microcopy 'For teams reviewing Workday performance, support, reporting, adoption, or optimisation' covers five secondary keyword clusters in a single natural sentence.",
                "workday performance, workday support, workday reporting, workday adoption, workday optimisation"
              ),
            ],
          });
        })(),

        gap(100),
        h2("Homepage Meta Specifications"),

        (() => {
          const border = { style: BorderStyle.SINGLE, size: 1, color: MID };
          const borders = { top: border, bottom: border, left: border, right: border };
          const row = (label, value, fill) => new TableRow({
            children: [
              new TableCell({ borders, width: { size: 2400, type: WidthType.DXA }, shading: { fill: LGREY, type: ShadingType.CLEAR }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [bold(label, 18)], spacing: { before: 0, after: 0 } })] }),
              new TableCell({ borders, width: { size: 6960, type: WidthType.DXA }, shading: fill ? { fill, type: ShadingType.CLEAR } : undefined, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: value, size: 18, color: "2D3748", font: "Courier New" })], spacing: { before: 0, after: 0 } })] }),
            ],
          });
          return new Table({
            width: { size: 9360, type: WidthType.DXA },
            columnWidths: [2400, 6960],
            rows: [
              row("Page Title", "Workday Consulting Partner | Zeneesha", GREEN_L),
              row("Char Count", "44 characters — well within 60 character limit"),
              row("Meta Description", "Zeneesha is your dedicated Workday consulting partner — reducing friction, improving performance, and maximising ROI across HCM, Finance, and Adaptive Planning. Request a health check today.", GREEN_L),
              row("Char Count", "191 characters — aim to trim to 155 for full SERP display"),
              row("H1 (Hero)", "Smarter Workday. Stronger ROI [set as page H1 in CMS — not H2 or P tag]"),
              row("Canonical URL", "https://www.zeneesha.com/ [confirm www vs non-www redirect is set]"),
              row("Schema", "Organisation + FAQ schema — see Section 6"),
            ],
          });
        })(),

        pb(),

        // ═══════════════════════════════════════════════════
        // SECTION 5: CONTENT WRITING GUIDELINES
        // ═══════════════════════════════════════════════════
        h1("5.  Content Writing Guidelines"),
        gap(80),

        h2("Writing for Intent, Not Just Keywords"),
        para("Google's Helpful Content system (updated 2024–2025) prioritises pages that genuinely satisfy a searcher's intent over pages that simply pack in keywords. Every piece of content should answer the question: 'What does someone searching this phrase actually need to know?'"),
        gap(60),
        bulletBold("Navigational intent: ", "User already knows Zeneesha. Homepage, About, Contact — focus on clarity and conversion."),
        bulletBold("Informational intent: ", "User has a Workday problem and is researching. Blog posts, FAQ section — focus on education and demonstrating expertise."),
        bulletBold("Commercial intent: ", "User is evaluating Workday consulting partners. Service pages — focus on proof, differentiation, and social validation."),
        bulletBold("Transactional intent: ", "User is ready to act. CTA sections, Contact page, Health Checkup landing page — focus on reducing friction to conversion."),

        gap(100),
        h2("Tone and Language Principles"),
        bulletBold("Peer-level, not promotional. ", "Write like a senior Workday consultant speaking to a peer, not like marketing copy selling a service. Buyers in this space are technical; they will disengage from generic language."),
        bulletBold("Problem-first structure. ", "Acknowledge the problem before presenting the solution. The homepage structure already follows this correctly: Challenges (S3) before Solution (S4)."),
        bulletBold("Precision over adjectives. ", "Replace 'world-class expertise' with '15+ years average consultant experience'. Replace 'end-to-end support' with 'Implementation, AMS, and ongoing optimisation'. Specific claims build trust; adjectives do not."),
        bulletBold("Active voice. ", "Write 'Zeneesha reviews your setup' not 'Your setup is reviewed by Zeneesha'. Active voice is easier to read and performs better in search snippets."),
        bulletBold("Scannable structure. ", "Use short paragraphs (2–3 sentences max), clear subheadings, and strategic white space. B2B readers scan before they read."),

        gap(100),
        h2("Keyword Density and Placement"),
        para("There is no target percentage for keyword density. Over-optimisation is a ranking penalty risk. Follow these placement rules instead:"),
        gap(60),
        bulletBold("First 100 words: ", "Include the primary keyword naturally in the opening paragraph or hero section."),
        bulletBold("H2 headings: ", "At least one H2 per page should contain a secondary keyword."),
        bulletBold("Once in the meta description. ", "The primary keyword must appear in the meta description."),
        bulletBold("Alt text on relevant images. ", "One image per section should have keyword-relevant alt text."),
        bulletBold("No more than 2–3 times per 500 words for the same exact phrase. ", "Vary with synonyms and related terms (e.g. 'Workday support', 'Workday AMS', 'Workday assistance')."),

        gap(100),
        h2("Content Length Guidelines"),
        (() => {
          const border = { style: BorderStyle.SINGLE, size: 1, color: MID };
          const borders = { top: border, bottom: border, left: border, right: border };
          const row = (type, length, rationale) => new TableRow({
            children: [
              new TableCell({ borders, width: { size: 2800, type: WidthType.DXA }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [bold(type, 17)], spacing: { before: 0, after: 0 } })] }),
              new TableCell({ borders, width: { size: 1800, type: WidthType.DXA }, shading: { fill: TEAL_L, type: ShadingType.CLEAR }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [bold(length, 17, TEAL)], spacing: { before: 0, after: 0 } })] }),
              new TableCell({ borders, width: { size: 4760, type: WidthType.DXA }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: rationale, size: 17, color: GREY, font: "Arial" })], spacing: { before: 0, after: 0 } })] }),
            ],
          });
          const hrow = () => new TableRow({
            children: ["Content Type", "Target Length", "Rationale"].map((t, i) =>
              new TableCell({ borders, width: { size: [2800, 1800, 4760][i], type: WidthType.DXA }, shading: { fill: SLATE, type: ShadingType.CLEAR }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: t, bold: true, size: 18, color: WHITE, font: "Arial" })], spacing: { before: 0, after: 0 } })] })
            ),
          });
          return new Table({
            width: { size: 9360, type: WidthType.DXA },
            columnWidths: [2800, 1800, 4760],
            rows: [
              hrow(),
              row("Homepage (total)", "1,200–1,800 words", "Long enough to cover multiple keyword clusters without padding."),
              row("Service Pages", "800–1,200 words", "Enough to explain the service, address objections, and include proof."),
              row("Blog Posts (SEO)", "1,200–2,000 words", "Google tends to favour longer, comprehensive posts for competitive queries."),
              row("Blog Posts (Thought Leadership)", "600–900 words", "Shorter posts are fine for opinion and insight pieces — no ranking target."),
              row("Case Studies", "600–800 words", "Signal → Diagnosis → Decision → Outcome. Quantified where possible."),
              row("FAQ Answers", "60–120 words per answer", "Short enough to be featured snippet eligible; long enough to add value."),
            ],
          });
        })(),

        pb(),

        // ═══════════════════════════════════════════════════
        // SECTION 6: SCHEMA MARKUP
        // ═══════════════════════════════════════════════════
        h1("6.  Schema Markup Guidelines"),
        gap(80),

        para("Schema markup (structured data) tells Google what your content is — not just what it says. For zeneesha.com, two schema types are immediately high-value and must be implemented on launch."),
        gap(100),

        h2("FAQ Schema — Homepage Priority"),
        para("The homepage FAQ section (Section 8) contains five questions that are ideal candidates for FAQ schema. When implemented correctly, Google can display these questions and answers directly in the search results as expanded, clickable items — without the user needing to click through to the site."),
        gap(60),
        ...infoBox("Why this matters:", "FAQ rich results can double or triple the visual space your listing takes up in Google SERPs. For a B2B service with a very specific audience, appearing with expanded FAQ answers for queries like 'Can Zeneesha help if Workday is already implemented?' or 'What happens during a Workday Health Checkup?' puts the right message in front of the right buyer at the moment they are deciding.", TEAL_L, TEAL),

        gap(80),
        h3("FAQ Schema Implementation (pass to developer)"),
        new Paragraph({
          children: [new TextRun({ text: "Implement as JSON-LD in the <head> of the homepage. Use the exact approved FAQ copy from Version 3:", size: 18, color: GREY, font: "Arial" })],
          spacing: { before: 80, after: 80 },
        }),
        new Paragraph({
          children: [new TextRun({ text: `{\n  "@context": "https://schema.org",\n  "@type": "FAQPage",\n  "mainEntity": [\n    {\n      "@type": "Question",\n      "name": "How do I know if our Workday system needs a health check?",\n      "acceptedAnswer": {\n        "@type": "Answer",\n        "text": "If you are seeing recurring issues, manual workarounds, reporting delays or low adoption, it may be time to review what is causing friction."\n      }\n    },\n    {\n      "@type": "Question",\n      "name": "Can Zeneesha help if Workday is already implemented?",\n      "acceptedAnswer": {\n        "@type": "Answer",\n        "text": "Yes. Zeneesha supports post-go-live Workday environments through AMS, optimisation, reporting, releases, integrations, automation and adoption support."\n      }\n    },\n    {\n      "@type": "Question",\n      "name": "We already have an internal Workday team. Can you still help?",\n      "acceptedAnswer": {\n        "@type": "Answer",\n        "text": "Yes. Zeneesha works alongside internal teams to add specialist expertise, extra capacity and a clearer improvement roadmap."\n      }\n    },\n    {\n      "@type": "Question",\n      "name": "Which Workday modules does Zeneesha support?",\n      "acceptedAnswer": {\n        "@type": "Answer",\n        "text": "Zeneesha supports key Workday modules including HCM, Finance, Adaptive Planning and Analytics, with expertise across reporting and integrations."\n      }\n    },\n    {\n      "@type": "Question",\n      "name": "What happens during a Workday Health Checkup?",\n      "acceptedAnswer": {\n        "@type": "Answer",\n        "text": "Zeneesha reviews your Workday setup, processes, data, reporting, integrations and adoption to identify gaps, risks and optimisation opportunities."\n      }\n    }\n  ]\n}`, size: 15, color: "1A3A1A", font: "Courier New" })],
          shading: { fill: "F0F4F0", type: ShadingType.CLEAR },
          spacing: { before: 80, after: 80 },
          indent: { left: 200, right: 200 },
        }),

        gap(100),
        h2("Organisation Schema — Site-Wide"),
        para("Organisation schema on the homepage helps Google understand who Zeneesha is, what it does, and how to contact it. This supports the Knowledge Panel in Google Search and improves brand credibility signals."),
        gap(60),
        bulletBold("Required fields: ", "@type: Organization, name, url, logo, description, sameAs (LinkedIn, etc.)"),
        bulletBold("Add: ", "areaServed (UK/Global), knowsAbout (Workday HCM, Workday Finance, Workday AMS), contactPoint for enquiries."),
        bulletBold("Do not duplicate: ", "Organisation schema goes on the homepage only. Service pages use 'Service' schema. Blog posts use 'Article' schema."),

        pb(),

        // ═══════════════════════════════════════════════════
        // SECTION 7: TECHNICAL SEO CHECKLIST
        // ═══════════════════════════════════════════════════
        h1("7.  Technical SEO Checklist — New Build Launch"),
        gap(80),

        para("The following checklist must be completed before the revamped zeneesha.com goes live. Items are drawn directly from the audit findings and represent the minimum baseline for a search-performant site."),
        gap(80),

        h2("Content Team Responsibilities"),
        new Table({
          width: { size: 9360, type: WidthType.DXA },
          columnWidths: [4200, 1600, 3560],
          rows: [
            tableHeaderRow3("Item", "Status", "Notes", [4200, 1600, 3560]),
            checkRow("Write unique meta descriptions for all 13 business-critical pages", "Required", "Use the format: [Value statement + keyword + soft CTA]. 140–155 chars.", "CC4400"),
            checkRow("Confirm H1 is set correctly on every page (one per page)", "Required", "The footer 'Workday®' CTA in the current theme creates a second H1 — must be removed in rebuild.", "CC4400"),
            checkRow("Supply alt text for all images used in the revamp", "Required", "Pass an alt text list alongside image assets. Format: descriptive phrase + keyword.", "CC4400"),
            checkRow("Finalise FAQ copy for schema implementation (all 5 questions)", "Complete ✓", "Version 3 FAQ is approved. Pass exact text to developer for JSON-LD.", TEAL),
            checkRow("Confirm page title for all pages (50–60 chars, keyword-first)", "Required", "Homepage title recommended: Workday Consulting Partner | Zeneesha", "CC4400"),
            checkRow("Mark internal links in copy where service pages are mentioned", "Required", "e.g. 'AMS & Support' in Services section should link to the AMS service page URL.", "CC4400"),
            checkRow("Confirm case study metrics are approved for publication", "Pending client", "Version 3 notes 'final metrics and client approval to be added'. Must resolve before launch.", "B45309"),
          ],
        }),

        gap(100),
        h2("Development / SEO Team Responsibilities"),
        new Table({
          width: { size: 9360, type: WidthType.DXA },
          columnWidths: [4200, 1600, 3560],
          rows: [
            tableHeaderRow3("Item", "Status", "Notes", [4200, 1600, 3560]),
            checkRow("Set 301 redirects for all old URLs changing structure", "Required", "Especially any pages where URL slugs change. GA shows 5 users hitting 404s monthly.", "CC4400"),
            checkRow("Fix homepage meta typo ('Zenesha' → 'Zeneesha')", "Required", "Visible in every Google search result. Zero tolerance.", "CC4400"),
            checkRow("Remove duplicate H1 from footer CTA section", "Required", "Site-wide issue. New theme build must prevent this.", "CC4400"),
            checkRow("Implement FAQ schema (JSON-LD) on homepage", "Required", "Use approved JSON from Section 6 of this document.", "CC4400"),
            checkRow("Implement Organisation schema on homepage", "Required", "See Section 6 guidance.", "CC4400"),
            checkRow("Reduce script/stylesheet count (currently 22 scripts, 36 stylesheets on homepage)", "Required", "Core Web Vitals dependency. Target: <10 scripts, <10 stylesheets.", "CC4400"),
            checkRow("Enable Core Web Vitals monitoring post-launch", "Required", "Connect Google Search Console. Monitor CWV for 28 days post-launch.", "CC4400"),
            checkRow("Verify sitemap reflects new URL structure", "Required", "Update and resubmit sitemap in Google Search Console post-launch.", "CC4400"),
            checkRow("Confirm canonical tags are set site-wide", "Required", "Prevent indexing of duplicate content (e.g. /thank-you vs /contact/thank-you).", "CC4400"),
            checkRow("Set up Calendly or equivalent on Contact page", "Recommended", "Audit shows no scheduling tool. Major conversion gap.", "B45309"),
          ],
        }),

        pb(),

        // ═══════════════════════════════════════════════════
        // SECTION 8: INTERNAL LINKING
        // ═══════════════════════════════════════════════════
        h1("8.  Internal Linking Strategy"),
        gap(80),

        para("Internal links are how Google discovers, crawls, and weights pages. The existing site has 168 blog posts that link to almost nothing. That is 168 missed opportunities to pass authority to service pages. The revamped site must treat internal linking as a structural requirement, not an afterthought."),
        gap(100),

        h2("The Hub-and-Spoke Model"),
        para("Zeneesha.com should operate on a hub-and-spoke model:"),
        gap(60),
        bullet("The Homepage is the hub — it should link to every major service page."),
        bullet("Service Pages are secondary hubs — they link to related blog content and back to the homepage."),
        bullet("Blog Posts are spokes — they must link back to at least one service page per post."),
        bullet("Case Studies link to both the relevant service page and the contact / health checkup page."),

        gap(100),
        h2("Homepage Linking Requirements"),
        bulletBold("Services section: ", "Each of the three service blocks (Start, Grow, Achieve) must link to its corresponding service page. CTA: 'Explore our services' links to /services/."),
        bulletBold("Case study block: ", "'View case study' links to the full case study page (to be created)."),
        bulletBold("FAQ answers: ", "Where relevant, FAQ answers can link to deeper service pages (e.g. 'What happens during a health check' can link to the Health Checkup landing page)."),
        bulletBold("Do not create orphan pages. ", "Every new page created must be linked from at least one other page on the site. Pages that cannot be reached by crawling do not exist for SEO purposes."),

        gap(100),
        h2("Blog Internal Linking Rules"),
        bulletBold("Every blog post must link to at least one service page. ", "Use contextual anchor text (not 'click here'). Example: 'Zeneesha’s Workday AMS support' linking to /services/workday-ams-support."),
        bulletBold("Link related posts to each other. ", "Posts on the same topic cluster (e.g. HCM, reporting, adoption) should reference each other. This reduces the keyword cannibalism problem in the existing library."),
        bulletBold("Anchor text should be keyword-relevant. ", "Use the target keyword of the destination page as the anchor text where natural."),
        bulletBold("Maximum 3–5 internal links per blog post. ", "Do not link to everything. Choose the most relevant destinations."),

        pb(),

        // ═══════════════════════════════════════════════════
        // SECTION 9: CONTENT CALENDAR
        // ═══════════════════════════════════════════════════
        h1("9.  Content Calendar Framework"),
        gap(80),

        para("The blog has been dormant since September 2025. Google deprioritises stale sites. Restarting with a consistent, keyword-targeted publishing schedule is one of the highest-ROI actions available right now — the topic authority already exists in the library; it just needs to be activated."),
        gap(80),
        ...infoBox("Publication Target:", "A minimum of 2 keyword-targeted posts per month. Quality over quantity — each post must have a defined keyword target, proper meta data, and at least one internal link to a service page. One LinkedIn post per blog post. This is the minimum viable content engine.", TEAL_L, TEAL),

        gap(100),
        h2("Recommended Content Pillars (Q2–Q3 2026)"),

        (() => {
          const border = { style: BorderStyle.SINGLE, size: 1, color: MID };
          const borders = { top: border, bottom: border, left: border, right: border };
          const row = (pillar, topics, kwTarget, page) => new TableRow({
            children: [
              new TableCell({ borders, width: { size: 2200, type: WidthType.DXA }, shading: { fill: LGREY, type: ShadingType.CLEAR }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [bold(pillar, 17)], spacing: { before: 0, after: 0 } })] }),
              new TableCell({ borders, width: { size: 3200, type: WidthType.DXA }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: topics, size: 17, color: "2D3748", font: "Arial" })], spacing: { before: 0, after: 0 } })] }),
              new TableCell({ borders, width: { size: 2000, type: WidthType.DXA }, shading: { fill: TEAL_L, type: ShadingType.CLEAR }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: kwTarget, size: 17, color: TEAL, font: "Arial" })], spacing: { before: 0, after: 0 } })] }),
              new TableCell({ borders, width: { size: 1960, type: WidthType.DXA }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: page, size: 17, color: GREY, font: "Arial" })], spacing: { before: 0, after: 0 } })] }),
            ],
          });
          const hrow = () => new TableRow({
            children: ["Pillar", "Sample Post Topics", "Keyword Target", "Links To"].map((t, i) =>
              new TableCell({ borders, width: { size: [2200, 3200, 2000, 1960][i], type: WidthType.DXA }, shading: { fill: SLATE, type: ShadingType.CLEAR }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: t, bold: true, size: 18, color: WHITE, font: "Arial" })], spacing: { before: 0, after: 0 } })] })
            ),
          });
          return new Table({
            width: { size: 9360, type: WidthType.DXA },
            columnWidths: [2200, 3200, 2000, 1960],
            rows: [
              hrow(),
              row("Workday Health", "Signs your Workday environment needs a review / What a Workday health check actually covers / How to build a Workday improvement roadmap", "workday health check, workday review", "/services/ + Contact"),
              row("AMS & Support", "Internal team vs. external AMS — what is right for you / How to reduce Workday ticket backlog / Building a sustainable Workday support model", "workday AMS support, workday managed services", "/services/workday-ams/"),
              row("Adoption & Change", "Why Workday adoption stalls after go-live / How to get teams to actually use Workday / Release management best practices", "workday adoption support, workday releases", "/services/ + blog cluster"),
              row("Reporting & Analytics", "Common Workday reporting mistakes and how to fix them / How to get faster insights from Workday data / When to use Workday Adaptive Planning vs. standard reports", "workday reporting, workday analytics consulting", "/services/workday-hcm-finance/"),
              row("Implementation Lessons", "What to do in the 90 days after Workday goes live / The most common Workday implementation gaps / How to set up Workday for long-term success", "workday implementation, workday post go-live", "/services/workday-implementation/"),
            ],
          });
        })(),

        gap(100),
        h2("Existing Blog Library — Priority Actions"),
        bulletBold("Step 1 — Audit the top 20 posts. ", "Identify the 20 posts closest to ranking on page 1 for their target keyword (use Google Search Console impression data). These are the highest-ROI optimisation targets."),
        bulletBold("Step 2 — Update meta titles and descriptions. ", "Every post in the library needs a keyword-relevant meta title and a compelling 150-character meta description."),
        bulletBold("Step 3 — Add internal links. ", "Each post should link to at least one service page. Do this systematically across the full library of 168 posts."),
        bulletBold("Step 4 — Consolidate cannibalising posts. ", "Posts that cover the same topic (e.g. 4+ posts on HCM consulting benefits) should be merged into one comprehensive post. Redirect the originals to the merged version."),
        bulletBold("Step 5 — Restart publishing. ", "Two new, properly optimised posts per month minimum. Consistent cadence signals to Google that the site is active and authoritative."),

        gap(100),
        h2("Quick-Win Summary"),
        gap(60),

        (() => {
          const border = { style: BorderStyle.SINGLE, size: 1, color: MID };
          const borders = { top: border, bottom: border, left: border, right: border };
          const row = (action, effort, impact, owner) => {
            const impactFill = impact === "High" ? GREEN_L : impact === "Medium" ? AMBER_L : LGREY;
            const impactColor = impact === "High" ? "1A7A4A" : impact === "Medium" ? "B45309" : GREY;
            return new TableRow({
              children: [
                new TableCell({ borders, width: { size: 4200, type: WidthType.DXA }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: action, size: 17, color: "2D3748", font: "Arial" })], spacing: { before: 0, after: 0 } })] }),
                new TableCell({ borders, width: { size: 1400, type: WidthType.DXA }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: effort, size: 17, color: GREY, font: "Arial" })], spacing: { before: 0, after: 0 } })] }),
                new TableCell({ borders, width: { size: 1400, type: WidthType.DXA }, shading: { fill: impactFill, type: ShadingType.CLEAR }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [bold(impact, 17, impactColor)], spacing: { before: 0, after: 0 } })] }),
                new TableCell({ borders, width: { size: 2360, type: WidthType.DXA }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: owner, size: 17, color: GREY, font: "Arial" })], spacing: { before: 0, after: 0 } })] }),
              ],
            });
          };
          const hrow = () => new TableRow({
            children: ["Action", "Effort", "SEO Impact", "Owner"].map((t, i) =>
              new TableCell({ borders, width: { size: [4200, 1400, 1400, 2360][i], type: WidthType.DXA }, shading: { fill: SLATE, type: ShadingType.CLEAR }, margins: { top: 80, bottom: 80, left: 120, right: 120 }, children: [new Paragraph({ children: [new TextRun({ text: t, bold: true, size: 18, color: WHITE, font: "Arial" })], spacing: { before: 0, after: 0 } })] })
            ),
          });
          return new Table({
            width: { size: 9360, type: WidthType.DXA },
            columnWidths: [4200, 1400, 1400, 2360],
            rows: [
              hrow(),
              row("Fix homepage meta typo and write proper meta description", "30 mins", "High", "SEO / Dev"),
              row("Implement FAQ schema on homepage", "2 hours", "High", "Dev"),
              row("Write alt text for all revamp images", "Half day", "High", "Content"),
              row("Fix 301 redirects for changed URLs", "Half day", "High", "Dev"),
              row("Set unique meta titles for all 13 key pages", "1 day", "High", "Content"),
              row("Add internal links from Services section to service pages", "2 hours", "High", "Content / Dev"),
              row("Optimise top 20 blog posts (title, meta, 1 internal link)", "3–4 days", "High", "Content"),
              row("Restart blog publishing (2 posts/month)", "Ongoing", "Medium", "Content"),
              row("Consolidate cannibalising blog posts", "1 week", "Medium", "Content + SEO"),
              row("Set up Calendly / scheduling on Contact page", "Half day", "Medium", "Dev"),
            ],
          });
        })(),

        gap(100),

        // Final closing note
        new Paragraph({
          children: [
            new TextRun({ text: "Document Owner: ", bold: true, size: 20, color: SLATE, font: "Arial" }),
            new TextRun({ text: "iKawn  |  ", size: 20, color: GREY, font: "Arial" }),
            new TextRun({ text: "Version 1.0  |  April 2026  |  Confidential", size: 20, color: GREY, font: "Arial" }),
          ],
          border: { top: { style: BorderStyle.SINGLE, size: 4, color: MID, space: 4 } },
          spacing: { before: 160, after: 80 },
          alignment: AlignmentType.CENTER,
        }),
        new Paragraph({
          children: [new TextRun({ text: "Questions? Contact the iKawn team before making changes to the approved homepage copy or SEO specifications.", size: 18, color: GREY, italics: true, font: "Arial" })],
          spacing: { before: 0, after: 0 },
          alignment: AlignmentType.CENTER,
        }),
      ],
    },
  ],
});

Packer.toBuffer(doc).then(buffer => {
  fs.writeFileSync("/sessions/admiring-nifty-hamilton/mnt/Zeneesha/Zeneesha_SEO_Content_Guidelines.docx", buffer);
  console.log("Done: Zeneesha_SEO_Content_Guidelines.docx");
});
