# Smart Lead Capture Widget

A configurable callback widget with intelligent time-slot scheduling, behavioral triggers and a lightweight PHP administration panel.

## Overview

Smart Lead Capture Widget is a lightweight, configurable lead generation component designed for integration into landing pages and websites.

Its purpose is to capture potential customer inquiries by offering visitors a convenient way to request a callback.

Unlike a conventional contact form, the widget combines an animated floating action button, a customizable modal form, callback scheduling logic and behavioral triggers that can automatically initiate the interaction based on visitor activity.

The project was designed with deployment flexibility in mind: it can operate on different hosting environments without requiring a database server or complex infrastructure.

## Key Features

### 1. Interactive Lead Capture

- Animated floating callback button.

- Modal window with a callback request form.

- Phone number input.

- Multiple ways to open the callback form.

- Modal dismissal through the close button, backdrop click or Escape key.

### 2. Smart Callback Scheduling

The widget generates available callback time slots dynamically based on the configured working hours.

Features include:

- Configurable working-hour boundaries.

- Dynamic generation of available hourly intervals.

- Date selection for upcoming callback requests.

- Time-dependent availability.

- Prevention of invalid working-hour ranges in the administration interface.

- The scheduling logic is designed to prevent visitors from selecting callback times outside the configured working hours.

### 3. Behavioral Triggers

The widget supports several interaction scenarios:

- Exit intent: detects when a visitor moves the cursor towards the top edge of the browser window.

- Time on site: automatically displays the callback form after a visitor has spent a defined amount of time on the website.

- Manual activation: opens the form when the visitor clicks the floating button.

A session-based timer tracks the visitor's time on the website. Cookies are used to limit repeated automatic popup displays after dismissal.

### 4. Administration Panel

The administration interface allows website owners to configure the widget without modifying its source code.

Available settings:

- Enable or disable individual activation triggers.

- Configure callback working hours.

- Enable or disable date and time selection.

- Customize the widget's colors.

- Prevention of invalid working-hour ranges.

- Edit the callback form heading.

The interface includes a live SVG preview that reflects color changes immediately.

### 5. Lightweight Deployment

The project uses file-based configuration storage instead of a database.

This architectural decision was made to simplify deployment across different hosting environments, particularly where database provisioning is unavailable or unnecessary.

## Architecture

The application consists of two main parts: the administration panel and the client-facing widget.

## Technical Decisions

### File-Based Configuration Instead of a Database

One of the main architectural decisions was to avoid introducing a database dependency. The widget is intended to be deployed across different websites and hosting environments. Not all of these environments provide a database or justify the additional infrastructure.

### Reactive Configuration Management

Vue 3 was used in the administration interface to create a reactive configuration experience.

The Composition API (ref, computed and watch) manages configuration state and dependent input values, for example, the available end-time options are dynamically filtered according to the selected start time. This prevents administrators from configuring an invalid working-hour range through the interface. Vue 3 is the only external frontend dependency. Using a CDN allows the widget to run without npm, a bundler, or a build step. Given the widget's lightweight nature and deployment across different websites and hosting environments, introducing a build pipeline would add unnecessary complexity.

## Deployment Requirements

- PHP-enabled web hosting.

- Writable permissions for the configuration file or its containing directory.

- JavaScript enabled in the visitor's browser.
