import React from "react";
import { useState } from "react";
import { Dimensions, TextInput, Button } from "react-native";
import { TouchableOpacity } from "react-native";
import { Text, View, StyleSheet } from "react-native";
import { Picker } from '@react-native-picker/picker';
import DateTimePickerModal from "react-native-modal-datetime-picker";

const { width, height } = Dimensions.get("window");

export default function Registrazione() {
    const [selectedValue, setSelectedValue] = useState("java");
    const [selectDate,setSelectDate]=useState("Seleziona data di nascita:");
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
        setSelectDate(year+"-"+month+"-"+day);
        hideDatePicker();
    };
    return (

        <View style={styles.mainContainer}>
            <View style={styles.container} >
                <Text style={styles.title}>Hello</Text>
                <Text style={styles.subTitle}>Registrati per entrare in HypeBest</Text>
                <TextInput style={styles.textInput} placeholder="Nome"></TextInput>
                <TextInput style={styles.textInput} placeholder="Cognome"></TextInput>

                <Picker
                    selectedValue={selectedValue}
                    style={styles.combo}
                    onValueChange={(itemValue, itemIndex) => setSelectedValue(itemValue)}
                >
                    <Picker.Item label="Uomo" value="Uomo" />
                    <Picker.Item label="Donna" value="Donna" />
                    <Picker.Item label="Preferisco non specificarlo" value="Preferisco non specificarlo" />
                </Picker>


                <TouchableOpacity style={styles.date} onPress={showDatePicker}>
                    <Text style={{color:"gray"}}>{selectDate}</Text>
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
                    <Text>Registrati</Text>
                </TouchableOpacity>
                <TouchableOpacity style={styles.buttonAccedi}>
                    <Text >Accedi</Text>
                </TouchableOpacity>

                {/* <View style={styles.separator} lightColor="#eee" darkColor="rgba(255,255,255,0.1)" /> */}
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
        // width:width,
        // height:height,
    },
    title: {
        fontSize: 80,
        fontWeight: "bold",
    },
    subTitle: {
        fontSize: 20,
    },
    textInput: {
        // borderWidth:1,
        // borderColor: "gray",
        width: "80%",
        height: 50,
        padding: 10,
        // paddingStart: 30,
        marginTop: 10,
        borderRadius: 30,
        textAlign: "center",
        backgroundColor: "#fff",
        // alignItems: "center",
        // justifyContent: "center",
    },
    buttonAccedi: {
        width: "80%",
        height: 50,
        marginTop: 10,
        borderRadius: 30,
        backgroundColor: "#fff",
        alignItems: "center",
        justifyContent: "center",
        //     borderWidth:1,
        // borderColor: "gray",

    },
    buttonRegistrati: {
        width: "80%",
        height: 50,
        marginTop: 50,
        borderRadius: 30,
        backgroundColor: "#fff",
        //     borderWidth:1,
        // borderColor: "gray",
        alignItems: "center",
        justifyContent: "center",
    },
    date:{
        width: "80%",
        height: 50,
        marginTop: 10,
        borderRadius: 30,
        backgroundColor: "#fff",
        //     borderWidth:1,
        // borderColor: "gray",
        alignItems: "center",
        justifyContent: "center",
    },
    combo: {
        width: "80%",
        height: 50,
        padding: 10,
        marginTop: 10,
        borderRadius: 30,
        textAlign: "center",
        backgroundColor: "#fff",
    }
});
