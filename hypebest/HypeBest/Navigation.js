import React from "react";

import { Button } from "native-base";

import { NavigationContainer } from "@react-navigation/native";
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';

import Aggiungi from "./screens/Aggiungi"
import Home from "./screens/Home"
import Profilo from "./screens/Profilo"
import Ricerca from "./screens/Ricerca"
import Accedi from "./screens/Accedi"
import Registrazione from "./screens/Registrazione"

import { Ionicons } from '@expo/vector-icons';

const Tab = createBottomTabNavigator();

export default function Navigation() {
  return (
    <NavigationContainer>
      <Tab.Navigator
        screenOptions={({ route }) => ({
          tabBarIcon: ({ focused, color, size }) => {
            let iconName;
            if (route.name === "Home") {
              iconName = focused ? "home" : "home-outline";
            } else if (route.name === "Ricerca") {
              iconName = focused ? "search" : "search-outline";
            } else if (route.name === "Aggiungi") {
              iconName = focused ? "add-circle" : "add-circle-outline";
            } else if (route.name === "Profilo") {
              iconName = focused ? "person" : "person-outline";
            } else if (route.name === "Accedi") {
              iconName = focused ? "flower" : "flower-outline";
            } else if (route.name === "Registrazione") {
              iconName = focused ? "eye" : "eye-outline";
            }
            return <Ionicons name={iconName} size={30} color={"black"} />
          },
          tabBarShowLabel: false
        })}>
        <Tab.Screen name="Home" component={Home}
          options={{
            headerRight: () => (
              <Button
                onPress={() => alert('This is a button!')}
                title="Info"
                color="#00cc00"
              />
            ),
          }}

        />
        <Tab.Screen name="Ricerca" component={Ricerca} />
        <Tab.Screen name="Aggiungi" component={Aggiungi} />
        <Tab.Screen name="Profilo" component={Profilo} />
        <Tab.Screen name="Accedi" component={Accedi} />
        <Tab.Screen name="Registrazione" component={Registrazione} />
      </Tab.Navigator>
    </NavigationContainer>
  )
}