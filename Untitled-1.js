/* Replace with your JS Code 
(Leave empty if not needed) */
onload = () => {
    const c = setTimeout(() => {
      document.body.classList.remove("not-loaded");
      clearTimeout(c);
    }, 1000);
  };
              