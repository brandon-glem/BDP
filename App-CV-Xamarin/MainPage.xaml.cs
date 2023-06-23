using System;
using System.Collections.Generic;
using Xamarin.Forms;

namespace App1
{
    public partial class MainPage : ContentPage
    {
        private List<string> paises;
        private List<string> nivelesIngles;
        private List<string> lenguajesProgramacion;
        private List<string> lenguajesSeleccionados;

        public MainPage()
        {
            InitializeComponent();

            // Inicializar las listas de opciones
            paises = new List<string>
            {
                "Argentina",
                "Brasil",
                "Perú",
                "Colombia",
                "México"
            };

            nivelesIngles = new List<string>
            {
                "Nulo",
                "Básico",
                "Intermedio",
                "Avanzado"
            };

            lenguajesProgramacion = new List<string>
            {
                "C++",
                "Fortran",
                "Python",
                "Ruby"
            };

            // Asignar las listas a los menús desplegables
            PaisesPicker.ItemsSource = paises;
            InglesPicker.ItemsSource = nivelesIngles;
            LenguajesListView.ItemsSource = lenguajesProgramacion;

            // Inicializar lista de lenguajes seleccionados
            lenguajesSeleccionados = new List<string>();
        }

        private void LenguajesListView_ItemTapped(object sender, ItemTappedEventArgs e)
        {
            var lenguaje = e.Item as string;
            if (lenguajesSeleccionados.Contains(lenguaje))
            {
                lenguajesSeleccionados.Remove(lenguaje);
            }
            else
            {
                lenguajesSeleccionados.Add(lenguaje);
            }
        }

        private void EnviarButton_Clicked(object sender, EventArgs e)
        {
            // Obtener los valores seleccionados
            string nombre = NombreEntry.Text;
            string apellidos = ApellidosEntry.Text;
            DateTime fechaNacimiento = FechaNacimientoPicker.Date;
            string correoElectronico = CorreoElectronicoEntry.Text;
            string nacionalidad = PaisesPicker.SelectedItem?.ToString();
            string nivelIngles = InglesPicker.SelectedItem?.ToString();

            // Mostrar los datos ingresados
            string mensaje = $"Nombre: {nombre}\n" +
                             $"Apellidos: {apellidos}\n" +
                             $"Fecha de nacimiento: {fechaNacimiento.ToString("dd/MM/yyyy")}\n" +
                             $"Correo electrónico: {correoElectronico}\n" +
                             $"Nacionalidad: {nacionalidad}\n" +
                             $"Nivel de inglés: {nivelIngles}\n" +
                             $"Lenguajes de programación: {string.Join(", ", lenguajesSeleccionados)}";

            DisplayAlert("Datos ingresados", mensaje, "Aceptar");
        }
    }
}
