import React from "react";
import { useState } from "react";
import { Dimensions, TextInput, StatusBar, Image, ScrollView, FlatList } from "react-native";
import { TouchableOpacity } from "react-native";
import { Text, View, StyleSheet } from "react-native";
import { Select, Box, CheckIcon, Center } from "native-base";
import DateTimePickerModal from "react-native-modal-datetime-picker";

import back from "../assets/back1.png";
const { width, height } = Dimensions.get("window");

export default function Registrazione() {
    const [selectedValue, setSelectedValue] = useState("java");
    const [service, setService] = useState("");
    const [selectDate, setSelectDate] = useState("Seleziona data di nascita:");
    const [isDatePickerVisible, setDatePickerVisibility] = useState(false);


    const showDatePicker = () => {
        setDatePickerVisibility(true);
    };

    const hideDatePicker = () => {
        setDatePickerVisibility(false);
    };

    const handleConfirm = (date) => {
        // console.warn("A date has been picked: ", date);

        const year = date.getFullYear();
        const month = date.getMonth();
        const day = date.getDate();
        setSelectDate(year + "-" + month + "-" + day);
        hideDatePicker();
    };

    // const generi = [
    //     {
    //       id: '1',
    //       title: 'Uomo',
    //     },
    //     {
    //       id: '2',
    //       title: 'Donna',
    //     },
    //     {
    //       id: '3',
    //       title: 'Preferisco non specificarlo',
    //     },
    //   ];

    //   const renderItem = ({ item }) => <Item title={item.title} />;
    //   const Item = ({ title }) => (
    //     <View style={styles.item}>
    //       <Text style={styles.titleItem}>{title}</Text>
    //     </View>
    //   );
    return (

        <View style={styles.mainContainer}>
            <Image source={back} style={styles.backImage} />
            <View style={styles.whiteSheet} />
            <View style={styles.container} >
                <ScrollView style={styles.scrollView}>
                    <Text style={styles.title}>Hello</Text>
                    <Text style={styles.subTitle}>Registrati per entrare in HypeBest</Text>
                    <TextInput style={styles.textInput} placeholder="Nome"></TextInput>
                    <TextInput style={styles.textInput} placeholder="Cognome"></TextInput>


                    <Select style={styles.date} selectedValue={service} minWidth="200" accessibilityLabel="Seleziona il genere" placeholder="Seleziona il genere" _selectedItem={{
                        bg: "teal.600",
                        endIcon: <CheckIcon size="5" />
                    }} mt={1} onValueChange={itemValue => setService(itemValue)}>
                        <Select.Item label="Uomo" value="ux" />
                        <Select.Item label="Donna" value="web" />
                        <Select.Item label="Preferisco non specificarlo" value="cross" />
                    </Select>



                    <TouchableOpacity style={styles.date} onPress={showDatePicker}>
                        <Text style={{ color: "gray" }}>{selectDate}</Text>
                    </TouchableOpacity>

                    <DateTimePickerModal
                        isVisible={isDatePickerVisible}
                        mode="date"
                        onConfirm={handleConfirm}
                        onCancel={hideDatePicker}
                    />

                    <TextInput style={styles.textInput} placeholder="E-mail"></TextInput>
                    <TextInput style={styles.textInput} placeholder="Password" secureTextEntry={true}></TextInput>
                    <TextInput style={styles.textInput} placeholder="Conferma password" secureTextEntry={true}></TextInput>

                    <TouchableOpacity style={styles.buttonRegistrati}>
                        <Text style={{ color: "black", fontWeight: "bold", fontSize: 20, }}>Registrati</Text>
                    </TouchableOpacity>
                    <TouchableOpacity style={styles.buttonAccedi}>
                        <Text style={{ color: "red", fontWeight: "bold", fontSize: 20, }}>Accedi</Text>
                    </TouchableOpacity>

                    {/* <View style={styles.separator} lightColor="#eee" darkColor="rgba(255,255,255,0.1)" /> */}
                </ScrollView>
            </View>
        </View>
    );
}

const styles = StyleSheet.create({
    mainContainer: { flex: 1 },
    container: {
        alignItems: "center",
        justifyContent: "center",
        // backgroundColor: "#f1f1f1",
        flex: 1,
        // paddingTop: "40%",
        // width:width,
        // height:height,
        // position: "absolute",
    },
    item: {
        backgroundColor: '#f9c2ff',
        padding: 20,
        marginVertical: 8,
        marginHorizontal: 16,

    },
    scrollView: {
        // paddingTop: "40%",
        width: "100%",
        // height:300,
        // marginHorizontal: 20,

    },
    backImage: {
        width: "100%",
        height: 340,
        position: "absolute",
        top: 0,
        resizeMode: "cover",
    },
    whiteSheet: {
        width: "100%",
        height: "80%",
        position: "absolute",
        bottom: 0,
        backgroundColor: "#fff",
        borderTopLeftRadius: 60,
    },
    title: {
        fontSize: 80,
        fontWeight: "bold",
        marginLeft: "10%",
        marginRight: "10%",
    },
    subTitle: {
        fontSize: 20,
        marginLeft: "10%",
        marginRight: "10%",
    },
    textInput: {
        // borderWidth:1,
        // borderColor: "gray",
        // width: "80%",
        height: 50,
        padding: 10,
        // paddingStart: 30,
        marginTop: 10,
        borderRadius: 15,
        textAlign: "center",
        backgroundColor: "#f6f7fb",
        marginLeft: "10%",
        marginRight: "10%",
        // alignItems: "center",
        // justifyContent: "center",
    },
    buttonAccedi: {
        // width: "80%",
        height: 50,
        marginTop: 10,
        borderRadius: 15,
        backgroundColor: "#fff",
        alignItems: "center",
        justifyContent: "center",
        borderWidth: 1,
        borderColor: "red",
        marginLeft: "10%",
        marginRight: "10%",
    },
    buttonRegistrati: {
        // width: "80%",
        height: 50,
        marginTop: 50,
        borderRadius: 15,
        backgroundColor: "#c82a1e",
        borderWidth: 1,
        borderColor: "red",
        alignItems: "center",
        justifyContent: "center",
        marginLeft: "10%",
        marginRight: "10%",
    },
    date: {
        // width: "80%",
        height: 50,
        marginTop: 10,
        borderRadius: 15,
        backgroundColor: "#f6f7fb",
        //     borderWidth:1,
        // borderColor: "gray",
        alignItems: "center",
        justifyContent: "center",
        marginLeft: "10%",
        marginRight: "10%",
    },
    combo: {
        // width: "80%",
        height: 50,
        padding: 10,
        marginTop: 10,
        borderRadius: 15,
        textAlign: "center",
        backgroundColor: "#f6f7fb",
        marginLeft: "10%",
        marginRight: "10%",
    }
});
