import React from "react";
import Footer from "./Footer";
import Header from "./Header";

export const Layout = ({ children, props }) => {
  return (
    <main className="container mx-auto">
      <Header />
      <section>{children}</section>
      <Footer />
    </main>
  );
};
