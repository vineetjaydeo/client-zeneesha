<?php
/**
 * Template Name: Service Page
 *
 * Client-approved service landing pages for Deployment, Maximise, Advisory,
 * and AI Enablement. Copy is sourced from Zeneesha Services.pdf.
 */

get_header();

$slug = get_post_field( 'post_name', get_the_ID() );
if ( 'implementation' === $slug ) {
    $slug = 'deployment';
}

$services = [
    'deployment' => [
        'eyebrow' => 'Workday Deployment Services',
        'hero_image' => 'sol-01-implementation.webp',
        'hero_alt' => 'Team planning a Workday deployment in a workshop',
        'title_lead' => 'Launch Workday',
        'title_accent' => 'Without the Friction',
        'intro' => 'Build Workday for long-term success right from the start. We handle the heavy lifting of your entire rollout, from enterprise process design to flawless data migration and the final deployment push, so your team can go live with absolute confidence, avoiding common implementation pitfalls.',
        'hero_actions' => [
            [ 'label' => 'Book A Free Consultation', 'primary' => true ],
            [ 'label' => 'Talk To A Workday Expert', 'primary' => false ],
        ],
        'capabilities_title' => 'How Zeneesha Architects Workday for Success',
        'capabilities_intro' => 'We believe in strategy before configuration. A seamless deployment is only possible when the foundational implementation is built correctly. We guide you through the entire lifecycle:',
        'capabilities' => [
            [ 'title' => 'Strategy & Planning', 'body' => 'We align your Workday architecture with your real-world business processes and long-term growth goals before making any technical changes.' ],
            [ 'title' => 'Advisory & Governance', 'body' => 'We provide expert guidance to help you navigate critical decisions, bypass operational blind spots, and apply enterprise best practices.' ],
            [ 'title' => 'Data Migration', 'body' => 'We clean, validate, and securely transfer your legacy data, ensuring your new system operates on a reliable single source of truth.' ],
            [ 'title' => 'User Acceptance Testing', 'body' => 'We rigorously stress-test all workflows and integrations to eliminate risks and deployment surprises.' ],
            [ 'title' => 'The Deployment (Go-Live)', 'body' => 'We manage the technical cutover, securely pushing your tailored Workday environment into production so your operations transition smoothly.' ],
            [ 'title' => 'Hypercare', 'body' => 'We provide real-time hypercare during launch to keep your business running without disruption.' ],
            [ 'title' => 'Dashboards & Reporting', 'body' => 'We build the essential reports you need from day one so leadership can make confident, data-driven decisions.' ],
            [ 'title' => 'Change Management', 'body' => 'We deploy targeted communication and training frameworks so your employees adopt the new system confidently and immediately.' ],
        ],
        'problem_title' => 'Why Workday Deployments Struggle After Go-Live',
        'problem_intro' => "Most Workday initiatives don't fail because of the software. They fail because critical strategic decisions are skipped, creating years of operational challenges, heavy support burdens, and missed value.",
        'problems' => [
            [ 'title' => 'Recreating Broken Processes', 'body' => 'Many Organisations simply move inefficient legacy workflows into Workday rather than optimising them. The impact: Employees rely on manual workarounds, adoption remains low, and productivity plateaus.' ],
            [ 'title' => 'Migrating Poor Quality Data', 'body' => 'Incomplete, duplicate, or outdated data is transferred without proper cleansing. The impact: Reporting becomes unreliable, integrations fail, and leadership loses trust in the system.' ],
            [ 'title' => 'Underestimating Integrations', 'body' => 'Workday rarely operates in isolation. Payroll, finance, IT, and third-party apps must sync flawlessly. The impact: Data silos emerge, critical processes break, and operational risk spikes.' ],
            [ 'title' => 'Configuring Before Defining Objectives', 'body' => 'Technology decisions are rushed before the true business requirements are understood. The impact: Costly rework, delayed timelines, and unexpectedly bloated budgets.' ],
            [ 'title' => 'Neglecting Change Management', 'body' => 'Employees are expected to adapt to new workflows without sufficient communication or support. The impact: Frustration rises, helpdesk tickets surge, and ROI stalls.' ],
        ],
        'context' => [
            'title' => 'Most Partners Focus On Go-Live. We Focus On What Happens Next.',
            'paragraphs' => [
                'Many systems integrators measure success solely by whether the system launches on time. We measure success by the business outcomes that follow:',
                'Because the architectural decisions made today will dictate your operational performance for years.',
            ],
            'questions' => [
                'Are employees actually logging in and using Workday?',
                'Can executive leadership blindly trust the data?',
                'Can new business requirements be supported without starting over?',
                'Is the system lean, easy to maintain, and easy to enhance?',
                'Can future Workday releases be adopted efficiently?',
            ],
        ],
        'cases' => [
            [ 'title' => '90%+ User Adoption In 90 Days', 'body' => 'Deployed Workday across multiple regions with a scalable foundation that drastically reduced the post-go-live support burden and restored reporting confidence.' ],
            [ 'title' => '35% Reduction In Manual HR Administration', 'body' => 'Redesigned core processes and strictly governed data quality prior to deployment, enabling faster reporting and immediate employee adoption from day one.' ],
        ],
        'rescue' => [
            'title' => 'Already Using Workday But Not Getting Results?',
            'paragraphs' => [
                "If your Workday is already live but people hate using it, or the reports are broken, you don't need to start completely over, you just need a rescue plan.",
                "Our Workday Tenant Health Check identifies the root causes, pinpoints exactly what is restricting your system's performance, and provides a clear roadmap to fix it.",
            ],
            'cta' => 'Book Your Free Health Check',
        ],
        'faqs' => [
            [ 'q' => 'What is the difference between Workday implementation and deployment?', 'a' => 'Implementation is the comprehensive, end-to-end strategy of designing and building the system to fit your business. Deployment is the specific, final phase of pushing that fully configured system live to your users. A successful deployment relies entirely on a strategic implementation.' ],
            [ 'q' => 'What does a Workday deployment partner do?', 'a' => 'A dedicated partner helps Organisations plan, configure, test, deploy, and continuously optimize Workday, drastically reducing project risk and accelerating user adoption.' ],
            [ 'q' => 'How long does a Workday rollout take?', 'a' => 'Timelines vary based on Organisational footprint, modules selected, integration volume, and data complexity. Most enterprise projects range from several months to over a year.' ],
            [ 'q' => 'What causes Workday deployments to fail?', 'a' => 'The most common friction points include skipping business process redesign, inadequate data cleansing, weak change management, insufficient user testing, and configuring the system before defining clear objectives.' ],
            [ 'q' => 'What happens after Workday goes live?', 'a' => 'Post-go-live activities are critical and typically include immediate hypercare support, driving user adoption, continuous Optimisation, building advanced reporting, and managing semi-annual Workday releases.' ],
        ],
        'final' => [
            'title' => "Let's Make Your Workday Deployment a Success.",
            'body' => 'Whether you are engineering a net-new Workday deployment or trying to rescue an existing one, we ensure the technology serves your business outcomes.',
            'cta' => 'Talk To A Workday Expert',
        ],
    ],
    'maximise' => [
        'eyebrow' => 'Workday Maximise Services',
        'hero_image' => 'sol-03-maximise.webp',
        'hero_alt' => 'Analytics dashboard used to review platform performance',
        'title_lead' => "Unlock Workday's",
        'title_accent' => 'Full Potential',
        'intro' => 'Move beyond basic day-one functionality. We optimise, expand, and mature your existing Workday ecosystem through advanced analytics, seamless integrations, global Phase X rollouts, and targeted user-adoption strategies.',
        'hero_actions' => [
            [ 'label' => 'Book A Free Health Check', 'primary' => true ],
        ],
        'capabilities_title' => 'Achieve More with Workday',
        'capabilities_intro' => 'Here is how we deliver targeted optimisation to maximise your Workday value:',
        'capabilities' => [
            [ 'title' => 'Phase X Deployments & Global Rollouts', 'body' => 'Extend your footprint. We support global growth by deploying new core modules (e.g., Financials, Advanced Comp) and scaling Workday to new geographies or acquired entities while ensuring local compliance.' ],
            [ 'title' => 'Advanced Analytics & Data Orchestration', 'body' => 'Unlock actionable intelligence. We build robust discovery boards, leverage Workday Prism Analytics, and move your leadership from historical reporting to predictive, real-time insights.' ],
            [ 'title' => 'Frictionless Integrations & Extensions', 'body' => 'Eliminate data silos. We replace brittle, custom-coded connections with secure, scalable integration pipelines and custom Workday Extend applications to unify your tech stack.' ],
            [ 'title' => 'Change Management & Continuous Adoption', 'body' => 'Fix user friction at the root. We analyse tenant usage data to identify where processes stall, delivering targeted training paths that embed Workday into daily employee workflows.' ],
            [ 'title' => 'Process Optimisation & System Hygiene', 'body' => 'Streamline complex Business Processes (BP). We simplify approval chains, clean up inherited configuration debt, and prepare your core data architecture for advanced automation readiness.' ],
        ],
        'problem_title' => 'The Cost of Sub-Optimised Workday Tenants',
        'problem_intro' => '',
        'problems' => [
            [ 'title' => 'The Configuration Drift Trap', 'body' => 'Over time, ad-hoc changes bypass standard governance, creating technical debt and breaking core workflows.' ],
            [ 'title' => 'Integration Bottlenecks', 'body' => 'Disconnected external payroll or CRM software forces manual data manipulation, introducing high error rates.' ],
            [ 'title' => 'The Adoption Deficit', 'body' => 'When user experiences are clunky, employees find workarounds outside of Workday, leading to severe data gaps.' ],
            [ 'title' => 'Reporting Paralysis', 'body' => 'Valuable transactional data remains trapped in fragmented structures, forcing executives to rely on offline spreadsheets.' ],
        ],
        'context' => [
            'title' => 'Evolving vs. Maintaining Your Tenant',
            'paragraphs' => [
                'How This Differs from Traditional Workday AMS: Traditional Application Management Services (AMS) are built to maintain your status quo, resolving day-to-day tickets, managing routine user access, and ensuring basic system stability.',
                'Workday Maximise is different. It is an intentional, strategic project designed to disrupt the status quo. Instead of just maintaining what you have, we actively re-engineer processes, deploy unconfigured modules (Phase X), break down data silos with advanced engineering, and scale your platform to match your business growth.',
            ],
            'framework_title' => 'The Zeneesha Framework',
            'framework' => [
                [ 'title' => 'Health Check & Audit', 'body' => 'We run deep technical diagnostics to find configuration debt, broken integrations, and underutilised licenses.' ],
                [ 'title' => 'Rationalisation', 'body' => 'We realign your Business Processes (BP) and security groups with current corporate structures.' ],
                [ 'title' => 'Evolution (Phase X)', 'body' => 'We roll out advanced features, deploy new modules, and build custom applications to fill operational gaps.' ],
                [ 'title' => 'Continuous Tuning', 'body' => 'We provide ongoing governance and Optimisation to ensure alignment with biannual Workday releases.' ],
            ],
        ],
        'cases' => [
            [ 'title' => 'Centralised Analytics via Workday Prism', 'body' => 'The Win: Deployed Workday Prism Analytics for KION Group to unify distributed global HR data across 100+ countries into a single source of truth. The Impact: Designed secure ETL flows that eliminated the need for third-party tools like Power BI while strictly adhering to GDPR guardrails.' ],
            [ 'title' => 'Skills-Driven Framework via Workday Extend', 'body' => 'The Win: Implemented Workday Skills Cloud and Career Hub for The LEGO Group to pivot to dynamic, skills-driven talent mapping. The Impact: Developed custom Workday Extend apps to deliver personalised learning recommendations, deeply embedding the platform into daily workflows to maximise adoption.' ],
        ],
        'faqs' => [
            [ 'q' => 'What does it mean to "Maximise" Workday value?', 'a' => 'It means evolving your platform beyond basic data entry. We help you configure unused features, streamline clunky business processes, expand to new regions, and turn your system data into a strategic asset.' ],
            [ 'q' => 'How does this differ from your AI Enablement services?', 'a' => 'This page focuses on the foundational health and expansion of your core Workday tenant (analytics, adoption, rollouts, and integrations). Our AI Enablement services focus specifically on activating and governing native machine learning and agentic tools once this core foundation is strong.' ],
            [ 'q' => 'How do you address low system adoption?', 'a' => "We don't just write user manuals. We look at tenant analytics to see exactly where users drop out of processes, then re-engineer the Business Process (BP) layout and deploy targeted change management to fix it." ],
            [ 'q' => 'Can you help us clear out old configuration debt?', 'a' => 'Yes. If your Workday environment was implemented years ago, business needs have likely evolved. We perform a comprehensive tenant audit to prune deprecated security groups, optimise approval chains, and restore system performance.' ],
            [ 'q' => 'We already have a Workday AMS partner. Why do we need Maximise Services?', 'a' => 'Your AMS partner keeps Workday running. Maximise Services help it evolve. We work alongside your existing AMS team or internal IT to deliver complex transformations, such as Workday Financials, Prism Analytics, global M&A integrations, and major optimisation initiatives, without disrupting day-to-day support.' ],
        ],
        'final' => [
            'title' => 'Ready to Unlock the True Capacity of Workday?',
            'body' => "Stop fighting your configuration. Let's clean up your data, streamline your workflows, and expand your platform's capabilities to match your business ambitions.",
            'cta' => 'Claim Your Free Workday Tenant Health Check',
        ],
    ],
    'advisory' => [
        'eyebrow' => 'Workday Advisory Services',
        'hero_image' => 'hero-advisory.jpg',
        'hero_alt' => 'Senior enterprise leaders reviewing a transformation roadmap',
        'title_lead' => 'Strategy Before',
        'title_accent' => 'Configuration.',
        'intro' => 'Make confident Workday decisions with senior-led advisory that aligns Workday with your business goals before, during, and after implementation.',
        'hero_actions' => [
            [ 'label' => 'Book an Advisory Session', 'primary' => true ],
        ],
        'capabilities_title' => 'Our Advisory Services',
        'capabilities_intro' => '',
        'capabilities' => [
            [ 'title' => 'Strategic Consulting', 'body' => 'Align your Workday footprint with broader business objectives to define an optimisation strategy and target operating model that scales with the company, not just the system.' ],
            [ 'title' => 'Implementation Roadmapping', 'body' => 'Build phased, realistic deployment blueprints for Core HCM, Financials, or Phase 2 modules to prevent rollout timeline slips and budget overruns before they happen.' ],
            [ 'title' => 'Tenant Health Checks', 'body' => 'Audit your active Workday tenant to identify technical debt, security configuration gaps, underutilised features, and process bottlenecks.' ],
            [ 'title' => 'Pre-Sign-Off Reviews', 'body' => "Before you approve your implementation partner's configuration, get an independent, third-party validation so hidden architectural flaws don't surface after go-live." ],
            [ 'title' => 'Retained Consulting Hours', 'body' => 'On-demand access to elite Workday consultants for ongoing strategic guidance, release management support, and steering committee input without bloated SOWs.' ],
        ],
        'problem_title' => 'Where Workday Investments Stall',
        'problem_intro' => "Most enterprise transformation friction doesn't stem from technical failure; it stems from strategic gaps. We consistently see organisations face the same core challenges:",
        'problems' => [
            [ 'title' => 'Blind Partner Sign-Off', 'body' => "Approving a System Integrator's (SI) configuration without independent validation, only to inherit hidden architectural flaws at launch." ],
            [ 'title' => 'Misaligned Business Strategy', 'body' => "Building a Workday system that meets technical IT specs but fails to support the company's long-term financial and growth operating models." ],
            [ 'title' => 'Unrealistic, Blown Roadmaps', 'body' => 'Committing to a massive, non-phased rollout plan that triggers missed milestones, resource burnout, and constant budget extensions.' ],
            [ 'title' => 'Module Underutilisation', 'body' => 'Paying premium licensing fees for advanced Workday capabilities that sit unconfigured because there is no clear strategic roadmap for Phase 2.' ],
        ],
        'context' => [
            'title' => 'Why Zeneesha?',
            'paragraphs' => [
                'As an official Workday partner, we bring deep platform expertise directly to your team. Our advisory focus means we prioritise long-term strategy and sustainable configuration over bloated project timelines.',
            ],
            'comparison' => [
                'headings' => [ 'Feature', 'Typical Implementation Partner', 'Our Advisory Model' ],
                'rows' => [
                    [ 'Delivery Framework', 'Pure-play functional configuration based on standard worksheets.', 'Upstream strategic blueprinting aligned to the enterprise target operating model.' ],
                    [ 'Tenant Design Review', 'Basic functional verification of business processes (BPs) and security groups.', 'Deep-dive structural audits of global tenant hierarchies, supervisory orgs, and cross-module data inheritance.' ],
                    [ 'Risk Mitigation', 'Reactive troubleshooting during user acceptance testing (UAT).', 'Proactive, phase-gated risk assessments to prevent technical debt and structural scaling bottlenecks.' ],
                    [ 'Ecosystem Readiness', 'Focuses strictly on standalone Workday module delivery.', 'End-to-end integration mapping, downstream core system impacts, and data pipeline Optimisation.' ],
                    [ 'Post-Launch Continuity', 'Transition to high-volume, ticket-based application management services (AMS).', 'Retained elite Workday advisory for release management, platform optimisation, and roadmap scaling.' ],
                ],
            ],
        ],
        'cases' => [],
        'faqs' => [
            [ 'q' => 'What is Workday advisory, and how is it different from implementation/deployment?', 'a' => 'Workday advisory is independent, strategy-focused guidance that sits alongside or before your implementation work. Rather than configuring the system, we validate that the configuration aligns with your business goals, security standards, and long-term roadmap.' ],
            [ 'q' => 'Do you work alongside our existing System Integrator (SI), or replace them?', 'a' => "We work alongside your SI. Our role is independent validation and strategic oversight, not configuration delivery, so there's no conflict with your implementation partner's scope." ],
            [ 'q' => 'What happens during a pre-sign-off review?', 'a' => "We independently review your implementation partner's configuration before you approve go-live, checking for architectural flaws, security gaps, or misalignment with your business requirements that might otherwise surface after launch." ],
            [ 'q' => "Can you help if we've already gone live and are experiencing issues?", 'a' => 'Yes. Tenant Health Checks and Retained Consulting Hours are both designed for organisations post-go-live who want to identify and remediate issues, optimise underused capabilities, or get ongoing strategic support.' ],
        ],
        'final' => [
            'title' => 'Ready to De-Risk Your Roadmap?',
            'body' => 'Schedule a private executive briefing to discuss your upcoming transformation milestones and identify potential structural bottlenecks before they impact your bottom line.',
            'cta' => 'Book an Advisory Session',
        ],
    ],
    'ai-enablement' => [
        'eyebrow' => 'Workday AI Enablement',
        'hero_image' => 'hero-ai-enablement.jpg',
        'hero_alt' => 'Enterprise leaders reviewing an AI enablement model',
        'title_lead' => 'Make Your Workday',
        'title_accent' => 'AI-Ready.',
        'intro' => "Workday AI only delivers value when it's built on the right foundation, accurate data, well-designed processes, and strong governance. We help you get there, so AI becomes a real driver of productivity and better decisions, not just a feature you've switched on.",
        'hero_actions' => [
            [ 'label' => 'Speak to a Workday AI Expert', 'primary' => true ],
        ],
        'foundation' => [
            'title' => 'AI Starts with the Right Foundation',
            'paragraphs' => [
                "AI isn't just about turning on new features. It relies on accurate data, well-designed processes, and strong governance.",
                'Without the right foundations, AI can create inconsistent results, low adoption, and missed opportunities.',
                'Our AI Enablement services help you prepare your Workday environment, identify high-value use cases, and confidently adopt AI capabilities that improve productivity and decision-making.',
            ],
        ],
        'capabilities_title' => 'How We Help',
        'capabilities_intro' => '',
        'capabilities' => [
            [ 'title' => 'AI Readiness Assessment', 'body' => 'We assess your Workday tenant, data quality, security, and business processes to determine how prepared your organisation is for AI.' ],
            [ 'title' => 'AI Strategy & Roadmap', 'body' => 'We help you identify where AI can create the greatest impact and build a practical roadmap aligned to your business priorities.' ],
            [ 'title' => 'AI Feature Activation', 'body' => "We activate and optimise native Workday AI capabilities, including Illuminate (Workday's built-in AI engine for insights and recommendations) and AI Agents (automated assistants that handle routine HR and Finance tasks), so you get measurable value from the tools you're already paying for." ],
            [ 'title' => 'Process Automation', 'body' => 'We identify repetitive manual tasks and streamline HR and Finance processes using AI-powered workflows.' ],
            [ 'title' => 'Data & Governance', 'body' => 'Clean, well-governed data is the foundation of effective AI. We help improve data quality, strengthen governance, and ensure AI delivers reliable, secure insights.' ],
            [ 'title' => 'Adoption & Change Management', 'body' => 'We help your teams understand, adopt, and confidently use AI through training, best practices, and ongoing support.' ],
        ],
        'problem_title' => 'The Technical Friction Points We Solve',
        'problem_intro' => '',
        'problems' => [
            [ 'title' => 'Unstructured Data Silos', 'body' => 'Poor data hygiene and unmapped objects limiting AI processing accuracy.' ],
            [ 'title' => 'Complex Securitisation', 'body' => 'Misaligned security groups causing compliance or data exposure risks in AI outputs.' ],
            [ 'title' => 'Underutilised Engine Capability', 'body' => 'Native Workday AI features sitting dormant or unconfigured.' ],
            [ 'title' => 'Fragmented Process Chains', 'body' => 'Monolithic, manual HR and Finance business processes slowing down execution.' ],
            [ 'title' => 'Undefined KPI Frameworks', 'body' => 'Difficulty measuring the direct fiscal and operational impact of AI features.' ],
        ],
        'context' => [
            'title' => 'Why Zeneesha?',
            'why' => [
                [ 'title' => 'Workday-Native Frameworks', 'body' => 'We configure within your existing ecosystem, avoiding fragile third-party middleware.' ],
                [ 'title' => 'Architecture-First Strategy', 'body' => 'We prioritise data hygiene and system readiness before activating AI modules.' ],
                [ 'title' => 'Senior Enterprise Consultants', 'body' => "Hands-on execution led by architects who understand Workday's foundational object model." ],
                [ 'title' => 'Security & Compliance Guardrails', 'body' => 'Deep expertise in RBAC (Role-Based Access Control) and enterprise data privacy.' ],
                [ 'title' => 'Continuous Tenant Optimisation', 'body' => 'Post-deployment tuning to ensure your models scale alongside platform updates.' ],
            ],
            'framework_title' => 'Our Approach',
            'framework' => [
                [ 'title' => 'Audit & Discover', 'body' => 'Tenant architecture and data quality review' ],
                [ 'title' => 'Architect & Map', 'body' => 'High-ROI use case identification and technical roadmapping' ],
                [ 'title' => 'Provision & Tune', 'body' => 'Feature activation and business process integration' ],
                [ 'title' => 'Govern & Scale', 'body' => 'Continuous prompt and model optimisation' ],
            ],
        ],
        'cases' => [],
        'faqs' => [
            [ 'q' => 'What does "AI-ready" mean for a Workday tenant?', 'a' => 'An AI-ready tenant has clean, well-governed data, properly mapped security groups, and well-designed business processes. Without these foundations, Workday AI features tend to produce inconsistent or unreliable results.' ],
            [ 'q' => 'What is Workday Illuminate?', 'a' => "Illuminate is Workday's built-in AI engine, which powers intelligent insights, recommendations, and automation across HR and Finance processes natively within the platform." ],
            [ 'q' => 'Do we need to fix our data before activating Workday AI features?', 'a' => 'In most cases, yes. Poor data hygiene is one of the most common causes of inconsistent AI results and low adoption, so we typically recommend addressing data quality and governance before or alongside feature activation.' ],
            [ 'q' => 'Can you help us measure the ROI of Workday AI?', 'a' => 'Yes. One of the friction points we specifically address is the lack of defined KPI frameworks, which makes it hard to measure the fiscal and operational impact of AI. We help build measurement frameworks as part of the roadmap.' ],
        ],
        'final' => [
            'title' => 'Ready to Unlock AI in Workday?',
            'body' => "Stop treating AI as a roadmap slide. Let's prepare your tenant, secure your data, and activate the high-impact automation features already built into your platform.",
            'cta' => 'Book an AI Readiness Assessment',
        ],
    ],
];

$service = $services[ $slug ] ?? $services['deployment'];
$contact_url = home_url( '/contact/' );
$capability_count = count( $service['capabilities'] );
?>

<main id="main" class="ams-next-root service-landing-root service-landing-root--<?php echo esc_attr( $slug ); ?>" tabindex="-1">

  <section class="ams-next-hero">
    <div class="container ams-next-hero-grid">
      <div class="ams-next-hero-copy">
        <p class="ams-next-eyebrow reveal"><?php echo esc_html( $service['eyebrow'] ); ?></p>
        <h1 class="reveal delay-1"><?php echo esc_html( $service['title_lead'] ); ?> <span><?php echo esc_html( $service['title_accent'] ); ?></span></h1>
        <p class="ams-next-hero-intro reveal delay-2"><?php echo esc_html( $service['intro'] ); ?></p>
        <div class="ams-next-actions reveal delay-3">
          <?php foreach ( $service['hero_actions'] as $action ) : ?>
            <a href="<?php echo esc_url( $contact_url ); ?>" class="ams-next-button <?php echo ! empty( $action['primary'] ) ? 'ams-next-button--primary' : 'ams-next-button--secondary'; ?>">
              <?php echo esc_html( $action['label'] ); ?> <?php echo z_arrow( 14 ); ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
      <figure class="ams-next-hero-media ams-next-hero-media--photo reveal delay-2">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/' . $service['hero_image'] ); ?>" width="1400" height="933" alt="<?php echo esc_attr( $service['hero_alt'] ); ?>" fetchpriority="high">
      </figure>
    </div>
  </section>

  <section class="ams-next-logos" aria-label="Selected Zeneesha clients">
    <div class="container">
      <div class="ams-next-logo-row">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logos/kion.png' ); ?>" alt="KION Group" loading="lazy">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logos/warner.svg' ); ?>" alt="Warner Music Group" loading="lazy">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logos/aqa.svg' ); ?>" alt="AQA" loading="lazy">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logos/quadient.png' ); ?>" alt="Quadient" loading="lazy">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logos/slaughter.png' ); ?>" alt="Slaughter and May" loading="lazy">
      </div>
    </div>
  </section>

  <?php if ( ! empty( $service['foundation'] ) ) : ?>
    <section class="service-landing-foundation">
      <div class="container service-landing-foundation-grid">
        <h2 class="reveal"><?php echo esc_html( $service['foundation']['title'] ); ?></h2>
        <div class="service-landing-rich-copy reveal delay-1">
          <?php foreach ( $service['foundation']['paragraphs'] as $paragraph ) : ?>
            <p><?php echo esc_html( $paragraph ); ?></p>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="ams-next-problem">
    <div class="container">
      <div class="ams-next-problem-heading reveal">
        <h2><?php echo esc_html( $service['problem_title'] ); ?></h2>
        <?php if ( ! empty( $service['problem_intro'] ) ) : ?><p><?php echo esc_html( $service['problem_intro'] ); ?></p><?php endif; ?>
      </div>
      <div class="ams-next-problem-grid">
        <figure class="ams-next-problem-media reveal delay-1">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/workday-laptop-hover.png' ); ?>" width="6251" height="4501" alt="Workday workflow issue visual shown on a laptop" loading="lazy">
        </figure>
        <div class="ams-next-problem-list">
          <?php foreach ( $service['problems'] as $i => $problem ) : ?>
            <article class="ams-next-problem-item reveal" style="transition-delay:<?php echo esc_attr( $i * 80 ); ?>ms">
              <span><?php printf( '%02d', $i + 1 ); ?></span>
              <div><h3><?php echo esc_html( $problem['title'] ); ?></h3><p><?php echo esc_html( $problem['body'] ); ?></p></div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="ams-next-model" data-ams-dial>
    <div class="container">
      <script type="application/json" data-ams-dial-json><?php echo wp_json_encode( $service['capabilities'] ); ?></script>
      <div class="ams-next-model-heading reveal">
        <h2><?php echo esc_html( $service['capabilities_title'] ); ?></h2>
        <?php if ( ! empty( $service['capabilities_intro'] ) ) : ?><p><?php echo esc_html( $service['capabilities_intro'] ); ?></p><?php endif; ?>
      </div>
      <div class="ams-next-model-grid">
        <div class="ams-next-model-nav reveal delay-1" role="group" aria-label="<?php echo esc_attr( $service['eyebrow'] ); ?> areas">
          <?php foreach ( $service['capabilities'] as $i => $capability ) : ?>
            <button type="button" data-ams-dial-node data-index="<?php echo esc_attr( $i ); ?>" aria-pressed="<?php echo 0 === $i ? 'true' : 'false'; ?>">
              <span><?php printf( '%02d', $i + 1 ); ?></span><?php echo esc_html( $capability['title'] ); ?>
            </button>
          <?php endforeach; ?>
        </div>
        <div class="ams-next-model-panel reveal delay-2" aria-live="polite">
          <span data-ams-dial-count>01 / <?php printf( '%02d', $capability_count ); ?></span>
          <h3 data-ams-dial-title><?php echo esc_html( $service['capabilities'][0]['title'] ); ?></h3>
          <p data-ams-dial-body><?php echo esc_html( $service['capabilities'][0]['body'] ); ?></p>
        </div>
      </div>
      <div class="ams-next-section-actions reveal">
        <?php foreach ( $service['hero_actions'] as $action ) : ?>
          <a href="<?php echo esc_url( $contact_url ); ?>" class="ams-next-button <?php echo ! empty( $action['primary'] ) ? 'ams-next-button--primary' : 'ams-next-button--secondary'; ?>">
            <?php echo esc_html( $action['label'] ); ?> <?php echo z_arrow( 14 ); ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="service-landing-context">
    <div class="container">
      <div class="service-landing-context-heading reveal">
        <h2><?php echo esc_html( $service['context']['title'] ); ?></h2>
        <?php foreach ( $service['context']['paragraphs'] ?? [] as $paragraph ) : ?><p><?php echo esc_html( $paragraph ); ?></p><?php endforeach; ?>
      </div>

      <?php if ( ! empty( $service['context']['questions'] ) ) : ?>
        <div class="service-landing-question-grid">
          <?php foreach ( $service['context']['questions'] as $i => $question ) : ?>
            <div class="service-landing-question reveal" style="transition-delay:<?php echo esc_attr( $i * 70 ); ?>ms"><span><?php printf( '%02d', $i + 1 ); ?></span><p><?php echo esc_html( $question ); ?></p></div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if ( ! empty( $service['context']['why'] ) ) : ?>
        <div class="service-landing-why-grid">
          <?php foreach ( $service['context']['why'] as $i => $item ) : ?>
            <article class="service-landing-why-item reveal" style="transition-delay:<?php echo esc_attr( $i * 70 ); ?>ms"><h3><?php echo esc_html( $item['title'] ); ?></h3><p><?php echo esc_html( $item['body'] ); ?></p></article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if ( ! empty( $service['context']['comparison'] ) ) : $comparison = $service['context']['comparison']; ?>
        <div class="service-landing-table-wrap reveal" tabindex="0" role="region" aria-label="Advisory model comparison">
          <table class="service-landing-table">
            <thead><tr><?php foreach ( $comparison['headings'] as $heading ) : ?><th scope="col"><?php echo esc_html( $heading ); ?></th><?php endforeach; ?></tr></thead>
            <tbody><?php foreach ( $comparison['rows'] as $row ) : ?><tr><th scope="row"><?php echo esc_html( $row[0] ); ?></th><td><?php echo esc_html( $row[1] ); ?></td><td><?php echo esc_html( $row[2] ); ?></td></tr><?php endforeach; ?></tbody>
          </table>
        </div>
      <?php endif; ?>

      <?php if ( ! empty( $service['context']['framework'] ) ) : ?>
        <div class="service-landing-framework-heading reveal"><h2><?php echo esc_html( $service['context']['framework_title'] ); ?></h2></div>
        <div class="service-landing-framework-grid">
          <?php foreach ( $service['context']['framework'] as $i => $step ) : ?>
            <article class="service-landing-framework-card reveal" style="transition-delay:<?php echo esc_attr( $i * 80 ); ?>ms">
              <span><?php printf( '%02d', $i + 1 ); ?></span><h3><?php echo esc_html( $step['title'] ); ?></h3><p><?php echo esc_html( $step['body'] ); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <?php if ( ! empty( $service['cases'] ) ) : ?>
    <section class="ams-next-proof">
      <div class="container ams-next-proof-grid">
        <div class="ams-next-proof-lead reveal"><h2>Case Study</h2></div>
        <div class="ams-next-proof-stories">
          <?php foreach ( $service['cases'] as $i => $case ) : ?>
            <article class="reveal" style="transition-delay:<?php echo esc_attr( $i * 90 ); ?>ms"><span><?php printf( '%02d', $i + 1 ); ?></span><h3><?php echo esc_html( $case['title'] ); ?></h3><p><?php echo esc_html( $case['body'] ); ?></p></article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php if ( ! empty( $service['rescue'] ) ) : ?>
    <section class="service-landing-rescue">
      <div class="container service-landing-rescue-inner reveal">
        <h2><?php echo esc_html( $service['rescue']['title'] ); ?></h2>
        <?php foreach ( $service['rescue']['paragraphs'] as $paragraph ) : ?><p><?php echo esc_html( $paragraph ); ?></p><?php endforeach; ?>
        <a href="<?php echo esc_url( $contact_url ); ?>" class="ams-next-button ams-next-button--primary"><?php echo esc_html( $service['rescue']['cta'] ); ?> <?php echo z_arrow( 14 ); ?></a>
      </div>
    </section>
  <?php endif; ?>

  <section class="ams-next-faq">
    <div class="container ams-next-faq-grid">
      <div class="ams-next-faq-heading reveal"><h2>Frequently Asked Questions</h2></div>
      <div class="ams-next-faq-list">
        <?php foreach ( $service['faqs'] as $i => $faq ) : ?>
          <details class="ams-next-faq-item reveal" style="transition-delay:<?php echo esc_attr( $i * 70 ); ?>ms" <?php echo 0 === $i ? 'open' : ''; ?>><summary><?php echo esc_html( $faq['q'] ); ?></summary><p><?php echo esc_html( $faq['a'] ); ?></p></details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php
  $cta_section_id = 'service-contact';
  $cta_inner_id   = '';
  $cta_eyebrow    = $service['final']['cta'];
  $cta_heading    = $service['final']['title'];
  $cta_body       = $service['final']['body'];
  $cta_submit     = $service['final']['cta'];
  require __DIR__ . '/partials/form-cta.php';
  ?>

</main>

<?php get_footer(); ?>
