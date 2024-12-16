<template>
    <div class="zoom-pro">
        <header class="header">
            <div class="logo">Zoom<span>Pro</span></div>
            <nav>
                <ul class="nav-links">
                    <Link
                        :href="route('home')"
                        class="text-gray-400 hover:text-white transition duration-300"
                    >
                        Home
                    </Link>
                    <li><a href="#about-us">About Us</a></li>
                    <li><a href="#faq">FAQs</a></li>
                    <li><a href="#terms">Terms of Service</a></li>
                    <li><a href="#privacy">Privacy Policy</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <section id="about-us" class="content-section">
                <h2 class="text-2xl">About Us</h2>
                <p class="mt-4 text-lg">
                    Welcome to Zoom Pro, your go-to destination for high-quality
                    camera rentals. Whether you're a seasoned professional or
                    just getting started, we provide a wide selection of
                    top-tier equipment to meet the needs of photographers,
                    videographers, and content creators alike. Our mission is to
                    offer you the tools necessary to bring your creative vision
                    to life, without the high cost of purchasing expensive gear.
                </p>

                <p class="mt-2 text-lg">
                    At Zoom Pro, we understand that every project is unique, and
                    the right equipment can make all the difference. That's why
                    we carefully curate our inventory with the latest models
                    from leading brands like Sony, Canon, Nikon, and more. From
                    DSLRs and mirrorless cameras to lenses, tripods, and
                    lighting kits, our rental options are designed to give you
                    the flexibility to choose the perfect gear for your specific
                    needs.
                </p>

                <p class="mt-2 text-lg">
                    Our team is passionate about helping you succeed. We are
                    committed to providing exceptional customer service and
                    support every step of the way. Whether you're booking
                    equipment for a one-time project or need ongoing rentals, we
                    make the process simple, seamless, and hassle-free. With our
                    flexible rental periods and competitive rates, we ensure
                    that you only pay for what you need, when you need it.
                </p>

                <p class="mt-2 text-lg">
                    Zoom Pro is more than just a rental service—we’re your
                    trusted partner in bringing your creative ideas to life. We
                    pride ourselves on building long-lasting relationships with
                    our clients and offering personalized recommendations based
                    on your unique needs and preferences. Our goal is to make
                    your creative journey as smooth as possible, ensuring that
                    you have the right tools to capture every moment with
                    precision and clarity.
                </p>

                <p class="mt-2 text-lg">
                    Thank you for choosing Zoom Pro for your camera rental
                    needs. We look forward to helping you create stunning
                    visuals and unforgettable memories.
                </p>
            </section>

            <section id="faq" class="content-section">
                <h2>FAQs</h2>
                <ul>
                    <li>
                        <strong>How can I rent a camera?</strong>
                        <p>
                            Visit our store or website, choose your gear, and
                            complete the checkout process.
                        </p>
                    </li>
                    <li>
                        <strong>Can I extend my rental period?</strong>
                        <p>
                            Yes, extensions are available. Please contact us in
                            advance to avoid late fees.
                        </p>
                    </li>
                    <li>
                        <strong>Is a deposit required?</strong>
                        <p>
                            Yes, a refundable security deposit is required for
                            all rentals.
                        </p>
                    </li>
                </ul>
            </section>

            <section id="terms" class="content-section">
                <h2>Terms of Service</h2>

                <ul>
                    <li>
                        <strong>Rental Availability and Confirmation:</strong>
                        <p>
                            Rentals are subject to availability and must be
                            confirmed through a completed booking. We reserve
                            the right to refuse rentals if the equipment is
                            unavailable or if booking requirements are not met.
                        </p>
                    </li>

                    <li>
                        <strong>Rental Duration and Charges:</strong>
                        <p>
                            Rental periods are charged on a daily basis. The
                            rental period begins at the time of pickup or
                            delivery and ends when the equipment is returned.
                            Late returns will incur additional fees, calculated
                            on a pro-rated daily basis. If the equipment is not
                            returned within 48 hours of the due date, the renter
                            will be charged for an additional day of rental.
                        </p>
                    </li>

                    <li>
                        <strong>Responsibility for Damage:</strong>
                        <p>
                            Damage to equipment during the rental period is the
                            responsibility of the renter. Any damage, loss, or
                            theft must be reported immediately. Renters may be
                            required to pay for the full repair or replacement
                            costs, depending on the extent of the damage.
                            Renters should ensure that all equipment is returned
                            in the same condition as it was rented.
                        </p>
                    </li>

                    <li>
                        <strong>Cancellation and Modifications:</strong>
                        <p>
                            Cancellation of rentals must be made at least 24
                            hours in advance to avoid a cancellation fee. If a
                            cancellation is made within 24 hours, a fee equal to
                            50% of the rental cost will be charged. Any changes
                            to the rental period or equipment must be requested
                            at least 12 hours before the original rental start
                            time.
                        </p>
                    </li>

                    <li>
                        <strong>Insurance and Liability:</strong>
                        <p>
                            Renters are advised to obtain insurance coverage for
                            the rental period. We are not responsible for any
                            loss, injury, or damage caused by the use or misuse
                            of rented equipment. Renters should ensure that they
                            are properly trained and familiar with the equipment
                            before use.
                        </p>
                    </li>

                    <li>
                        <strong>Delivery and Pickup:</strong>
                        <p>
                            Delivery and pickup services may be available for an
                            additional fee. Delivery charges will be calculated
                            based on the renter's location. Renters must ensure
                            that there is someone available to receive the
                            equipment during the scheduled delivery time.
                        </p>
                    </li>

                    <li>
                        <strong>Usage Restrictions:</strong>
                        <p>
                            The equipment rented must only be used for its
                            intended purpose. Renters are prohibited from using
                            the equipment in any unlawful activities or
                            situations that may cause harm to themselves,
                            others, or the equipment.
                        </p>
                    </li>

                    <li>
                        <strong>Return Process:</strong>
                        <p>
                            All rented equipment must be returned in person or
                            by the scheduled pickup time. Failure to do so will
                            result in a late fee, and continued failure to
                            return the equipment may result in legal action.
                        </p>
                    </li>

                    <li>
                        <strong>Refunds and Disputes:</strong>
                        <p>
                            Any issues with the rented equipment must be
                            reported immediately. If a dispute arises regarding
                            the quality or functionality of the equipment, we
                            will offer a resolution on a case-by-case basis.
                            Refunds will be processed only in cases where the
                            equipment is found to be defective at the time of
                            pickup.
                        </p>
                    </li>

                    <li>
                        <strong>Privacy and Data Protection:</strong>
                        <p>
                            By renting equipment from us, you consent to the
                            collection and processing of your personal data in
                            accordance with our privacy policy. Your information
                            will be used for booking purposes, communication,
                            and service improvement. We will not share your data
                            with third parties unless required by law.
                        </p>
                    </li>
                </ul>
            </section>

            <section id="privacy" class="content-section">
                <h2 class="text-2xl">Privacy Policy</h2>
                <p class="mt-4 text-lg">
                    Zoom Pro is fully committed to protecting your privacy. We
                    collect only the necessary information required to process
                    your orders, manage your rentals, and improve your overall
                    experience with our services. This includes details such as
                    your name, contact information, payment data, and any other
                    information needed for booking and rental purposes.
                </p>

                <p class="mt-2 text-lg">
                    The information we gather is used exclusively to complete
                    your rental transactions, communicate with you regarding
                    your bookings, and enhance our offerings. Specifically, we
                    may use your information to process and manage your orders,
                    keep you informed about updates, promotions, and offers, and
                    to ensure the smooth operation of our services by addressing
                    user feedback and preferences. Additionally, your
                    information helps us maintain secure transactions and
                    prevent fraudulent activity.
                </p>

                <p class="mt-2 text-lg">
                    Zoom Pro values your privacy and will never share your
                    personal data with third parties without your explicit
                    consent, unless required by law or in response to a legal
                    request. We may also share your information in situations
                    where it is necessary to protect the safety, rights, or
                    property of Zoom Pro, our customers, or others. In the event
                    of a business transaction, such as a merger, acquisition, or
                    sale of assets, your personal data may be transferred as
                    part of that process.
                </p>

                <p class="mt-2 text-lg">
                    We implement a range of security measures to protect your
                    personal information. These measures include encrypted data
                    storage, secure payment processing, and regular security
                    audits. While we make every effort to ensure the security of
                    your data, it is important to note that no system is
                    completely immune to risks, and we cannot guarantee absolute
                    security.
                </p>

                <p class="mt-2 text-lg">
                    You have the right to access, correct, or delete any
                    personal data we hold about you. If you wish to exercise any
                    of these rights or have concerns regarding your data, please
                    contact us through the contact details on our website. We
                    will promptly address your requests and ensure that your
                    information is managed in accordance with applicable privacy
                    laws.
                </p>

                <p class="mt-2 text-lg">
                    To enhance your experience on our website, we may use
                    cookies. Cookies are small text files placed on your device
                    to remember your preferences and improve site functionality.
                    By using our website, you consent to our use of cookies. If
                    you prefer, you can manage or disable cookies through your
                    browser settings.
                </p>

                <p class="mt-2 text-lg">
                    Zoom Pro reserves the right to update or modify this Privacy
                    Policy at any time. Any changes will be posted on this page
                    along with an updated revision date. We encourage you to
                    periodically review this policy to stay informed about how
                    we are safeguarding your personal information.
                </p>
            </section>
        </main>

        <footer class="footer">
            <p>
                &copy; {{ new Date().getFullYear() }} ZoomPro. All rights
                reserved.
            </p>
        </footer>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { usePage } from "@inertiajs/vue3";

export default {
    name: "AboutUs",
    setup() {
        const { props } = usePage();

        onMounted(() => {
            const scrollTo = props?.scrollTo;
            if (scrollTo) {
                const target = document.getElementById(scrollTo);
                if (target) {
                    target.scrollIntoView({ behavior: "smooth" });
                }
            }
        });
    },
};
</script>

<style scoped>
/* Colors */
:root {
    --primary-color: #ff007f; /* Pink */
    --secondary-color: #ff6600; /* Orange */
    --background-color: #0b1120; /* Dark background */
    --text-color: #e4e4e4; /* Light text */
    --card-bg: #12192d; /* Card background */
}

/* General Styles */
body {
    margin: 0;
    font-family: "Poppins", sans-serif;
    background: var(--background-color);
    color: var(--text-color);
}

/* Header */
.header {
    background: var(--background-color);
    padding: 1.5rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header .logo {
    font-size: 1.8rem;
    font-weight: bold;
    color: var(--text-color);
}

.header .logo span {
    color: var(--primary-color);
}

.nav-links {
    list-style: none;
    display: flex;
    gap: 1.5rem;
}

.nav-links a {
    color: var(--text-color);
    text-decoration: none;
    font-size: 1rem;
    transition: color 0.3s ease;
}

.nav-links a:hover {
    color: var(--primary-color);
}

/* Main Sections */
.content-section {
    background: var(--card-bg);
    padding: 2rem;
    margin: 2rem 10%;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.content-section h2 {
    font-size: 2rem;
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.content-section p {
    font-size: 1.2rem;
    line-height: 1.8;
    color: var(--text-color);
}

.content-section ul {
    list-style: none;
    padding: 0;
}

.content-section ul li {
    margin-bottom: 1.5rem;
}

.content-section ul li strong {
    color: var(--secondary-color);
}

.content-section ul li p {
    margin-top: 0.5rem;
    font-size: 1rem;
    line-height: 1.6;
}

/* Footer */
.footer {
    background: var(--background-color);
    text-align: center;
    padding: 1.5rem 0;
    color: #aaa;
}
</style>
